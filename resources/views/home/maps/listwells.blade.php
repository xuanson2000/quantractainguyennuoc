<div class="section-listbox section-cardbox" id="list-well-pane">
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
                $("#iput-well-name").typeahead({
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

