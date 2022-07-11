<header class="am-topbar am-text-sm">
    <h1 class="am-topbar-brand">
        <a href="<?= $label->url('Ticket-Index-index') ?>"><?= $authorize_type == 0 ? 'PESCMS Ticket' : $system['siteTitle'] ?></a>
    </h1>

    <button id="mobile-menu-button" class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
            data-am-collapse="{target: '#ticket-topbar-collapse'}">
        <span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <button id="mobile-new-tips-button" class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-white am-show-sm-only"
            data-am-collapse="{target: '#mobile-new-tips'}">
        <span class="am-icon-envelope-o"></span>
        <span class="msg-tips" style="display: none"></span>
    </button>

    <?php if (!empty(self::session()->get('ticket'))): ?>
        <div class="am-collapse am-topbar-collapse" id="mobile-new-tips">
            <ul class="am-nav am-nav-pills am-topbar-nav new-ticket">
                <li><a href="javascript:;" class="close-tips">暂无新工单</a></li>
            </ul>
        </div>

        <div class="am-collapse am-topbar-collapse" id="ticket-topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <?php if (!empty($menu)): ?>
                    <?php foreach ($menu as $topValue): ?>
                        <?php if (!empty($topValue['menu_child'])): ?>
                            <li class="am-dropdown" data-am-dropdown>
                                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                                    <i class="<?= $topValue['menu_icon'] ?>"></i> <?= $topValue['menu_name'] ?>
                                    <span class="am-icon-caret-down"></span>
                                </a>
                                <ul class="am-dropdown-content">
                                    <?php foreach ($topValue['menu_child'] as $value): ?>
                                        <li>
                                            <a href="<?= $value['menu_type'] == '0' ? $label->url($value['menu_link']) : $value['menu_link']; ?>"><i class="<?= $value['menu_icon'] ?>"></i> <?= $value['menu_name'] ?>
                                            </a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?= $topValue['menu_type'] == '0' ? $label->url($topValue['menu_link']) : $topValue['menu_link'] ?>">
                                    <i class="<?= $topValue['menu_icon'] ?>"></i> <?= $topValue['menu_name'] ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php elseif (MODULE == 'Setting' && in_array(ACTION, ['atUpgrade', 'mtUpgrade'])): ?>
                    <li>
                        <a class="am-dropdown-toggle" href="<?= $label->url('Ticket-Setting-upgrade') ?>">
                            <i class="am-icon-reply"></i> 返回检查升级
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="am-topbar-right">
                <ul class="am-nav am-nav-pills am-topbar-nav admin-header-list">
                    <?php if ($label->checkAuth(GROUP . 'GETMemberissue') === true): ?>
                        <li class="am-hide-sm-only">
                            <a href="<?= $label->url('Ticket-Member-issue') ?>"><i class="am-icon-plus"></i> 新工单</a>
                        </li>
                    <?php endif; ?>
                    <li class="am-hide-sm-only">
                        <a href="javascript:;">您好,<?= self::session()->get('ticket')['user_name']; ?></a></li>
                    <li class="am-dropdown am-dropdown-flip am-hide-sm-only" data-am-dropdown>
                        <a href="<?= $label->url('Ticket-User-notice') ?>">
                            <i class="am-icon-envelope-o am-icon-sm"></i>
                            <span class="msg-tips" style="display: none"></span>
                        </a>
                        <ul class="am-dropdown-content new-ticket">
                            <li><a href="javascript:;" class="close-tips">暂无新工单</a></li>
                        </ul>
                    </li>

                    <li class="am-dropdown" data-am-dropdown="">
                        <a class="am-dropdown-toggle" data-am-dropdown-toggle="" href="javascript:;">
                            <i class="am-icon-male"></i> 个人中心 <span class="am-icon-caret-down"></span>
                        </a>
                        <ul class="am-dropdown-content">
                            <li><a href="<?= $label->url('Ticket-User-setting') ?>"><i class="am-icon-child"></i>
                                    个人信息</a></li>
                            <li><a href="<?= $label->url('Ticket-Phrase-index') ?>"><i class="am-icon-tags"></i>
                                    回复短语</a></li>
                        </ul>
                    </li>

                    <?php if ($label->checkAuth(GROUP . 'GETSettingaction') === true): ?>
                        <li>
                            <a href="<?= $label->url('Ticket-Index-clean', ['method' => 'GET']); ?>" class="ajax-click ajax-dialog" msg="确认需要清空缓存吗?"><i class="am-icon-recycle"></i>
                                清空缓存</a></li>
                    <?php endif; ?>

                    <li><a href="<?= $label->url('Ticket-Login-logout'); ?>"><i class="am-icon-sign-out"></i> 退出</a>
                    </li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</header>