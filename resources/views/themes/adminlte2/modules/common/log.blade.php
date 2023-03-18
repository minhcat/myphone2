<div class="box box-info mb-0">
    <div class="box-header with-border">
        <h4 class="box-title">Logs</h4>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-xs-3">
            <div class="form-group">
                <label for="nameInput">Account</label>
                <input type="text" class="form-control" id="nameInput">
            </div>
            </div>
            <div class="col-xs-3">
            <div class="form-group">
                <label for="startDateInput">Date</label>
                <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" id="startDateInput">
                </div>
            </div>
            </div>
            <div class="col-xs-3">
            <div class="form-group">
                <label for="statusInput">Status</label>
                <select name="statusInput" id="statusInput" class="form-control select2-nosearch" style="width: 100%;">
                <option value="0" selected="selected">all</option>
                <option value="0">pending</option>
                <option value="1">success</option>
                <option value="2">deny</option>
                <option value="3">fail</option>
                </select>
            </div>
            </div>
            <div class="col-xs-3">
            <div class="form-group">
                <label for="statusInput">Type</label>
                <select name="statusInput" id="statusInput" class="form-control select2-nosearch" style="width: 100%;">
                <option value="0" selected="selected">all</option>
                <option value="1">create</option>
                <option value="2">edit</option>
                <option value="4">delete</option>
                </select>
            </div>
            </div>
            <div class="col-xs-12">
            <button class="btn btn-info"><i class="fa fa-search"></i> Search</button>
            <button class="btn btn-default"><i class="fa fa-undo"></i> Reset</button>
            </div>
        </div>
        <table class="table table-bordered mt-5">
            <tbody>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>account</th>
                <th>date</th>
                <th>log</th>
                <th>status</th>
                <th>type</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Iphone 13 promax</td>
                <td>Minh Cat</td>
                <td>26/05/2022</td>
                <td>update : { name : { from : Iphone 13, to: Iphone 13 promax}}</td>
                <td>success</td>
                <td>update</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Iphone 13 promax</td>
                <td>Minh Cat</td>
                <td>26/05/2022</td>
                <td>update : { name : { from : Iphone 13, to: Iphone 13 promax}}</td>
                <td>success</td>
                <td>update</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Iphone 13 promax</td>
                <td>Minh Cat</td>
                <td>26/05/2022</td>
                <td>update : { name : { from : Iphone 13, to: Iphone 13 promax}}</td>
                <td>success</td>
                <td>update</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Iphone 13 promax</td>
                <td>Minh Cat</td>
                <td>26/05/2022</td>
                <td>update : { name : { from : Iphone 13, to: Iphone 13 promax}}</td>
                <td>success</td>
                <td>update</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Iphone 13 promax</td>
                <td>Minh Cat</td>
                <td>26/05/2022</td>
                <td>create : { name : iphone 13, brand: 1, description: Lorem ipsum dolor sit amet. }</td>
                <td>success</td>
                <td>create</td>
            </tr>
            </tbody>
        </table>
        <ul class="pagination pagination-sm mb-0 pull-right">
            <li><a href="#"><<</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">>></a></li>
        </ul>
    </div>
</div>