<div class="footer">
    <div class="container">
        <div class="footer-main">
            <div class="col-md-3 footer-grid">
                <h3>About This Theme</h3>
                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.account of the system.</p>
            </div>
            <div class="col-md-3 footer-grid">
                <h3>Recents Posts</h3>
                <div class="ftr-sub-gd">
                    <div class="col-md-4 ftr-gd2-img">
                        <a href="#"><img src="images/s1.jpg" alt=""></a>
                    </div>
                    <div class="col-md-8 ftr-gd2-text">
                        <a href="#">
                            <h4>How to Have The Best Vacation</h4>
                        </a>
                        <a href="#">
                            <p>Mar 3rd,2015</p>
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="ftr-sub-gd">
                    <div class="col-md-4 ftr-gd2-img">
                        <a href="#"><img src="images/s2.jpg" alt=""></a>
                    </div>
                    <div class="col-md-8 ftr-gd2-text">
                        <a href="#">
                            <h4>How to Have The Best Vacation</h4>
                        </a>
                        <a href="#">
                            <p>Mar 3rd,2015</p>
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="ftr-sub-gd">
                    <div class="col-md-4 ftr-gd2-img">
                        <a href="#"><img src="images/s3.jpg" alt=""></a>
                    </div>
                    <div class="col-md-8 ftr-gd2-text">
                        <a href="#">
                            <h4>How to Have The Best Vacation</h4>
                        </a>
                        <a href="#">
                            <p>Mar 3rd,2015</p>
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 footer-grid">
                <h3>Categories</h3>
                <ul>
                    <li><a href="#">Featured</a></li>
                    <li><a href="#">General</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">literature</a></li>
                    <li><a href="#">Videos</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <?php include('./layout/recentProject.php'); ?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="copy-main">
                <div class="copy-left">
                    <p>Design By<a href="http://w3layouts.com/" target="_blank"> W3layouts</a></p>
                </div>
                <div class="copy-right">
                    <ul>
                        <?php
                        $index = 0;
                        foreach ($pages as $key => $value) :
                            if ($title === $key) {
                                $active = 'active';
                            } else {
                                $active = '';
                            }
                        ?>

                            <li><a href="<?= $value ?>" class="<?= $active ?>"><?= $key ?></a></li>
                            <?= $index !== count($pages) - 1 ? '<li>/</li>' : null ?>
                        <?php
                            $index++;
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>