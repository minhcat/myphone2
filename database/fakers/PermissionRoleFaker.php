<?php

namespace Database\Fakers;

use Modules\Permission\Repositories\PermissionRepository;
use Modules\Role\Repositories\RoleRepository;

class PermissionRoleFaker extends AbstractFaker
{
    protected $permissionRepository;
    protected $roleRepository;

    protected $max1;
    protected $max2;
    protected $max3;
    protected $max4;
    protected $max5;
    protected $max6;

    public function __construct()
    {
        $this->permissionRepository = new PermissionRepository();
        $this->roleRepository = new RoleRepository();

        parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/permission_role/permission_role.php';
    }

    protected function beforeGenerate()
    {
        $this->genereateRoleId();
        $this->genereatePermissionId();
    }

    private function genereateRoleId()
    {
        $count = session('permission_role_count', 0);
        
        // Super admin
        $permissions = $this->permissionRepository->all();
        $max1 = $permissions->count();
        $this->max1 = $max1;
        if ($count < $max1) {
            session()->put('permission_role_count', $count + 1);
            $this->role_id = 1;
            return;
        }

        // Admin
        $permissions = $this->permissionRepository->get($this->makeWhere($this->getAdminPermissionData()));
        $max2 = $permissions->count() + $max1;
        $this->max2 = $max2;
        if ($count < $max2) {
            session()->put('permission_role_count', $count + 1);
            $this->role_id = 2;
            return;
        }
        
        // Creator
        $permissions = $this->permissionRepository->get($this->makeWhere($this->getCreatorPermissionData()));
        $max3 = $permissions->count() + $max2;
        $this->max3 = $max3;
        if ($count < $max3) {
            session()->put('permission_role_count', $count + 1);
            $this->role_id = 3;
            return;
        }

        // Reviewer
        $permissions = $this->permissionRepository->get($this->makeWhere($this->getReviewerPermissionData()));
        $max4 = $permissions->count() + $max3;
        $this->max4 = $max4;
        if ($count < $max4) {
            session()->put('permission_role_count', $count + 1);
            $this->role_id = 4;
            return;
        }

        // Viewer
        $permissions = $this->permissionRepository->get($this->makeWhere($this->getViewerPermissionData()));
        $max5 = $permissions->count() + $max4;
        $this->max5 = $max5;
        if ($count < $max5) {
            session()->put('permission_role_count', $count + 1);
            $this->role_id = 5;
            return;
        }

        // Vip Viewer
        $permissions = $this->permissionRepository->get($this->makeWhere($this->getVipViewerPermissionData()));
        $max6 = $permissions->count() + $max5;
        $this->max6 = $max6;
        if ($count < $max6) {
            session()->put('permission_role_count', $count + 1);
            $this->role_id = 6;
            return;
        }
    }
    
    private function genereatePermissionId()
    {
        if ($this->role_id == 1) {
            $this->permission_id = $this->getResourceId($this->permissionRepository, 'permission_role_permission_id');
            reset_session('permission_role_permission_id', $this->max1 - 1);
        } elseif ($this->role_id == 2) {
            $this->permission_id = $this->getResourceId($this->permissionRepository, 'permission_role_permission_id', 1, $this->makeWhere($this->getAdminPermissionData()));;
            reset_session('permission_role_permission_id', $this->max2 - $this->max1);
        } elseif ($this->role_id == 3) {
            $this->permission_id = $this->getResourceId($this->permissionRepository, 'permission_role_permission_id', 1, $this->makeWhere($this->getCreatorPermissionData()));;
            reset_session('permission_role_permission_id', $this->max3 - $this->max2);
        } elseif ($this->role_id == 4) {
            $this->permission_id = $this->getResourceId($this->permissionRepository, 'permission_role_permission_id', 1, $this->makeWhere($this->getReviewerPermissionData()));;
            reset_session('permission_role_permission_id', $this->max4 - $this->max3);
        } elseif ($this->role_id == 5) {
            $this->permission_id = $this->getResourceId($this->permissionRepository, 'permission_role_permission_id', 1, $this->makeWhere($this->getViewerPermissionData()));;
            reset_session('permission_role_permission_id', $this->max5 - $this->max4);
        } elseif ($this->role_id == 6) {
            $this->permission_id = $this->getResourceId($this->permissionRepository, 'permission_role_permission_id', 1, $this->makeWhere($this->getVipViewerPermissionData()));;
            reset_session('permission_role_permission_id', $this->max6 - $this->max5);
        }
    }

    private function makeWhere($data)
    {
        $wheres = [];
        
        if (array_key_exists('denies', $data)) {
            $denies = $data['denies'];
            $allows = [];
            foreach ($denies as $deny) {
                if (array_key_exists('module', $deny)) {
                    $module = $deny['module'];
                    if (array_key_exists('allow', $deny)) {
                        $actions = $deny['allow'];
                        foreach ($actions as $action) {
                            $allows[] = ['or', 'key', $module.':'.$action];
                        }
                        $allows[] = ['or-not-like', 'key', $module.':'];
                        continue;
                    }
                    $wheres[] = ['not-like', 'key', $module.':'];
                } elseif (array_key_exists('action', $deny)) {
                    $action = $deny['action'];
                    if (array_key_exists('allow', $deny)) {
                        $modules = $deny['allow'];
                        foreach ($modules as $module) {
                            $allows[] = ['or', 'key', $module.':'.$action];
                        }
                        $allows[] = ['or-not-like', 'key', ':'.$action];
                        continue;
                    }
                    $wheres[] = ['not-like', 'key', ':'.$action];
                }
            }
            $result = array_merge($allows, $wheres);
        } elseif (array_key_exists('allows', $data)) {
            $allows = $data['allows'];
            $wheres = [];
            foreach ($allows as $allow) {
                if (array_key_exists('module', $allow)) {
                    $wheres[] = $allow['module'];
                }
            }
            $wheres2 = [];
            foreach ($allows as $allow) {
                if (array_key_exists('action', $allow)) {
                    foreach ($wheres as $where) {
                        $wheres2[] = $where.':'.$allow['action'];
                    }
                }
            }
            $wheres3 = [];
            foreach ($wheres2 as $where) {
                $wheres3[] = ['or', 'key', $where];
            }
            $result = $wheres3;
        }

        return $result;
    }

    private function getAdminPermissionData()
    {
        return [
            'denies'    =>  [
                [
                    'module'    => 'theme',  
                ],
                [
                    'module'    => 'config',  
                ],
                [
                    'module'    => 'role',
                    'allow'     => ['browse', 'read'],
                ],
            ],
        ];
    }

    private function getCreatorPermissionData()
    {
        return [
            'denies'    => [
                [
                    'module'    => 'theme',  
                ],
                [
                    'module'    => 'config',  
                ],
                [
                    'module'    => 'role',
                ],
                [
                    'action'    => 'approve',
                ],
                [
                    'action'    => 'order',
                ],
                [
                    'action'    => 'edit',
                ],
                [
                    'action'    => 'delete',
                ],
            ]
        ];
    }

    private function getReviewerPermissionData()
    {
        return [
            'denies'    => [
                [
                    'module'    => 'theme',  
                ],
                [
                    'module'    => 'config',  
                ],
                [
                    'module'    => 'role',
                ],
                [
                    'action'    => 'add',
                ],
                [
                    'action'    => 'edit',
                ],
                [
                    'action'    => 'delete',
                ],
            ]
        ];
    }

    private function getViewerPermissionData()
    {
        return [
            'denies'    => [
                [
                    'module'    => 'theme',  
                ],
                [
                    'module'    => 'config',  
                ],
                [
                    'module'    => 'role',
                ],
                [
                    'action'    => 'order',
                ],
                [
                    'action'    => 'approve',
                ],
                [
                    'action'    => 'add',
                ],
                [
                    'action'    => 'read',
                ],
                [
                    'action'    => 'edit',
                ],
                [
                    'action'    => 'delete',
                ],
            ]
        ];
    }

    private function getVipViewerPermissionData()
    {
        return [
            'denies'    => [
                [
                    'module'    => 'theme',  
                ],
                [
                    'module'    => 'config',  
                ],
                [
                    'module'    => 'role',
                ],
                [
                    'action'    => 'order',
                ],
                [
                    'action'    => 'approve',
                ],
                [
                    'action'    => 'add',
                ],
                [
                    'action'    => 'edit',
                ],
                [
                    'action'    => 'delete',
                ],
            ]
        ];
    }
}
