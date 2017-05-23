@extends('base::layouts.master')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/core/plugins/grid/dlshouwen.grid.css') }}"/>
@endpush

@section('content')
    <div class="box box-info">
        <div class="box-body no-padding">
            <div id="gridContainer"></div>
        </div>
        <div class="box-footer">
            <div id="gridToolBarContainer" class="grid-toolbar-container"></div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('vendor/core/js/confirm.js') }}"></script>
<script src="{{ asset('vendor/core/plugins/grid/dlshouwen.grid.js') }}"></script>
<script src="{{ asset('vendor/core/plugins/grid/i18n/zh-cn.js') }}"></script>
@endpush

@push('js')
<script>
    let dtGridColumns = [
        {id: 'title', title: '插件名称', fastQuery: true},
        {id: 'author', title: '作者', fastQuery: true},
        {id: 'description', title: '插件描述'},
        {id: 'version', title: '插件版本'},
    ];

    let dtGridOption = {
        lang: 'zh-cn',
        loadAll: true,
        loadURL: '{{ route('plugins.index') }}',
        columns: dtGridColumns,
        tools: 'refresh|fastQuery',
    };

    let operateHandle = function () {
        function _del(id) {
            let tpl = '您确定要删除该角色吗?'
            $.Confirm({
                url: '/admin/plugins/' + id,
                method: 'DELETE',
                data: {
                    Id: id
                },
                content: tpl
            });
        }

        return {
            del: _del
        }
    }();

    let grid = $.fn.dtGrid.init(dtGridOption);

    $(function () {
        grid.load();
    });
</script>
@endpush