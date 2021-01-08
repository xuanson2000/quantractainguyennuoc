<div id="pane">
    <div class="widget-pane widget-pane-visible">
        <div class="widget-pane-content scrollable-y scrollable-show">
            <div class="nawapi-logo d-flex justify-content-center" style="background-color: rgb(245, 245, 245);">

            </div>
            <div class="widget-pane-content-holder">
                <div class="section-listbox section-listbox-root" style="background-color: rgb(245, 245, 245);">
                    <div style="height: 48px;" class="section-listbox section-cardbox noprint" id="input-well-search">
                        <input type="text" id="input-well-name" class="form-control typeahead" data-provide="typeahead"
                               placeholder="Nhập tên Công trình">
                    </div>
                    <div class="section-listbox section-scrollbox scrollable-y scrollable-show">
                        <div class="section-listbox section-cardbox" id="list-well-pane">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="widget-pane-toggle-button-container">
            <div class="widget-pane-toggle-button noprint"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            url: wellAjaxListUri,
            dataType: 'html',
            success: function (result) {
                document.getElementById("list-well-pane").innerHTML = result;
            }
        });
        $.ajax({
            url: wellAjaxSearchListUri,
            dataType: 'json',
            success: function (result) {
                $("#input-well-name").typeahead({
                    source: result,
                    theme: "bootstrap4",
                    afterSelect: function (obj) {
                        showGetFeatureInfo(obj.name);
                    }
                });
            }
        });
    });
    $(".widget-pane-toggle-button").click(function () {
        var hasCollapsed = $('body').hasClass('pane-collapsed-mode');
        if (hasCollapsed == false) {
            $('body').removeClass('pane-open-mode');
            $('body').addClass('pane-collapsed-mode');
            $('.widget-pane').addClass('widget-pane-collapsed widget-pane-offscreen')
        }
        else {
            $('body').removeClass('pane-collapsed-mode');
            $('body').addClass('pane-open-mode');
        }
    });
</script>

