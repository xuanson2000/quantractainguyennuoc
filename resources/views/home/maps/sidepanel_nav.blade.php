<!-- CATEGORIES -->
<div class="side-nav mb-60">

    <ul class="list-group list-group-bordered list-group-noicon uppercase">
        <li class="list-group-item active">
            <a class="dropdown-toggle" href="#">VÙNG QUAN TRẮC</a>
            <ul id="network-list">
                @foreach($monitoring_networks as $network)
                        <li class="network-item">
                            @if (Route::is('maps.map.gwmap'))
                                <a href="#" value="{{$network->id}}"
                                   onclick="showWellListByNetwork({{$network->id}})">{{$network->network_name}}</a>
                            @elseif(Route::is('maps.map.swmap'))
                                <a href="#" value="{{$network->id}}"
                                   onclick="showSWstationListByNetwork({{$network->id}})">{{$network->network_name}}</a>
                            @elseif(Route::is('maps.gwreport.view'))
                                <a href="#" value="{{$network->id}}"
                                   onclick="showGWreportListByNetwork({{$network->id}})">{{$network->network_name}}</a>
                            @elseif(Route::is('maps.swreport.view'))
                                <a href="#" value="{{$network->id}}"
                                   onclick="showSWreportListByNetwork({{$network->id}})">{{$network->network_name}}</a>
                            @endif
                        </li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item active">
            <a class="dropdown-toggle" href="#">LƯU VỰC SÔNG</a>
            <ul id="basin-list">
                @foreach($river_basins as $basin)
                    <li class="basin-item">
                        @if (Route::is('maps.gwmap.view'))
                            <a href="#" value="{{$basin->gid}}"
                               onclick="showWellListByBasin({{$basin->gid}})">{{$basin->basin_name}}</a>
                        @elseif(Route::is('maps.swmap.view'))
                            <a href="#" value="{{$basin->gid}}"
                               onclick="showSWstationListByBasin({{$basin->gid}})">{{$basin->basin_name}}</a>
                        @elseif(Route::is('maps.gwreport.view'))
                            <a href="#" value="{{$basin->gid}}"
                               onclick="showGWreportListByBasin({{$basin->gid}})">{{$basin->basin_name}}</a>
                        @elseif(Route::is('maps.swreport.view'))
                            <a href="#" value="{{$basin->gid}}"
                               onclick="showSWreportListByBasin({{$basin->gid}})">{{$basin->basin_name}}</a>
                        @endif
                    </li>
                @endforeach

            </ul>
        </li>
    </ul>
</div>
<script type="text/javascript">
    // Get the container element
    var networkList = document.getElementById("network-list");
    // Get all buttons with class="btn" inside the container
    var netitems = networkList.getElementsByClassName("network-item");
    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < netitems.length; i++) {
        netitems[i].addEventListener("click", function() {
            var current = networkList.getElementsByClassName("active");
            if (current.length > 0) {
                current[0].className = current[0].className.replace(" active", "");
            }

            // Add the active class to the current/clicked button
            this.className += " active";
        });
    }
</script>
<!-- /CATEGORIES -->