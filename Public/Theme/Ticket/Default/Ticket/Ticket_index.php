<div class="am-padding-xs am-padding-top-0">
    <div class="am-panel am-panel-default">
        <div class="am-panel-bd">
            <div class="am-cf">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg"><?= $title ?></strong>

                    <a href="javascript:;" class="show-search-form am-show-sm-only"><i class="am-icon-plus"></i> 展开搜索栏</a>
                </div>
            </div>
            <div class="am-g am-margin-bottom-xs am-g-collapse am-margin-top-xs">
                <div class="am-u-sm-12 am-u-md-12 am-hide-sm-only ticket-search-form">
                    <?php require_once __DIR__.'/Ticket_index_search_form.php'?>
                </div>
            </div>
            <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>
            <?php if (empty($list)): ?>
                <div class="pes-alert pes-alert-info am-margin-top am-margin-bottom am-text-center" >
                    <p class="am-margin-0">本页面没有数据 :-(</p>
                </div>
            <?php else: ?>
                <?= $label->token() ?>
                <?php require_once __DIR__.'/Ticket_index_table.php'?>
                <ul class="am-pagination am-pagination-right am-text-sm">
                    <?= $page; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('.show-search-form').on('click', function () {
            $(this).remove();
            $('.ticket-search-form').attr('style' , 'display:block !important')
        })
    })
</script>