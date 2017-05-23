@extends('base::layouts.master')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/core/plugins/grid/dlshouwen.grid.css') }}"/>
@endpush

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="pull-right">
                <form class="search-dtGrid-form" action="">
                    <div class="form-group">
                        <input type="text" id="keyword" name="keyword" class="form-control"
                               placeholder="" autocomplete="off">
                        <a href="javascript:;" class="btn btn-search"><i class="fa fa-search"></i></a>
                    </div>
                </form>
            </div>
        </div>
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
        {id: 'title', title: '插件名称',},
        {id: 'description', title: '插件描述'},
        {id: 'version', title: '插件版本'},
        {id: 'author', title: '作者'},
        {id: 'operation', title: '管理操作'},
    ];

    let dtGridOption = {
        lang: 'zh-cn',
        loadAll: true,
        loadURL: '{{ route('plugins.index') }}',
        columns: dtGridColumns,
        tools: 'refresh',
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