<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-map-o"></i><span> Bản đồ </span> <span class="pull-right"><i class="fa fa-angle-right"></i></span></a>
    <ul class="list-unstyled">
        <li class="{{ Request::is('maps*') ? 'active' : '' }}">
            <a href="{!! route('maps.map.index') !!}"><i class="fa fa-edit"></i><span>Maps</span></a>
        </li>

        <li class="{{ Request::is('layerGroups*') ? 'active' : '' }}">
            <a href="{!! route('layer_groups.layer_group.index') !!}"><i class="fa fa-edit"></i><span>Layer Groups</span></a>
        </li>

        <li class="{{ Request::is('ollayers*') ? 'active' : '' }}">
            <a href="{!! route('ollayers.ollayer.index') !!}"><i class="fa fa-edit"></i><span>Ollayers</span></a>
        </li>

        <li class="{{ Request::is('projections*') ? 'active' : '' }}">
            <a href="{!! route('projections.projection.index') !!}"><i class="fa fa-edit"></i><span>Projections</span></a>
        </li>

    </ul>
</li>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-newspaper-o"></i><span> Bản tin </span> <span class="pull-right"><i class="fa fa-angle-right"></i></span></a>
    <ul class="list-unstyled">
        <li class="{{ Request::is('articles*') ? 'active' : '' }}">
            <a href="{!! route('articles.article.index') !!}"><i class="fa fa-edit"></i><span>Nước dưới đất</span></a>
        </li>

        <li class="{{ Request::is('layer_groups*') ? 'active' : '' }}">
            <a href="{!! route('layer_groups.layer_group.index') !!}"><i class="fa fa-edit"></i><span>Nước mặt</span></a>
        </li>

        <li class="{{ Request::is('ollayers*') ? 'active' : '' }}">
            <a href="{!! route('ollayers.ollayer.index') !!}"><i class="fa fa-edit"></i><span>Niên giám</span></a>
        </li>

        <li class="{{ Request::is('projections*') ? 'active' : '' }}">
            <a href="{!! route('projections.projection.index') !!}"><i class="fa fa-edit"></i><span>Tin tức</span></a>
        </li>

        <li class="{{ Request::is('projections*') ? 'active' : '' }}">
            <a href="{!! route('projections.projection.index') !!}"><i class="fa fa-edit"></i><span>Thông báo hệ thống</span></a>
        </li>

        <li class="{{ Request::is('categories*') ? 'active' : '' }}">
            <a href="{!! route('categories.category.index') !!}"><i class="fa fa-edit"></i><span>Danh mục tin</span></a>
        </li>
    </ul>
</li>