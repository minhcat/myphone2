<div class="modal {{ $modal['classes'] ?? '' }}" id="{{ $modal['id'] }}">
    <div class="modal-dialog">
        <div class="modal-content">
            @isset($modal['form'])
                <form action="{{ $modal['form']['url'] }}" method="{{ $modal['form']['method'] == 'GET' ? 'GET' : 'POST' }}">
                @if ($modal['form']['method'] !== 'GET')
                    @csrf
                    @method($modal['form']['method'])
                @endif
            @endisset
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">{{ $modal['title'] }}</h4>
                </div>
                <div class="modal-body">
                    <p>{{ $modal['message'] }}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">{{ $modal['buttons']['secondary']['text'] ?? 'Cancel' }}</button>
                    <button class="btn btn-primary" type="submit">{{ $modal['buttons']['primary']['text'] ?? 'Cancel' }}</button>
                </div>
            @isset ($modal['form'])
                @foreach($modal['form']['inputs'] as $input)
                    <input type="hidden" name="{{ $input['name'] }}" value="{{ $input['value'] }}">
                @endforeach
                </form>
            @endisset
        </div>
    </div>
</div>