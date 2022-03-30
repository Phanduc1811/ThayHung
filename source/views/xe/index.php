<?php
$count = ceil(count($dataSP) / 6);
$dm = new danhmuc();
foreach ($dataHang as $di) {
    $selected = $dm->getSPById($di['idBrand']);
}
?>
<section class="featured-places">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <span class="text-uppercase">TẤT CẢ SẢN PHẨM</span>
                </div>
                <div class="" style="display: flex; justify-content: center; align-items: center; margin-bottom: 1em;">
                    <form action="index.php">
                        <input type="hidden" name="controller" value="hang">
                        <input type="hidden" name="action" value="getspbyid">
                        <input type="hidden" name="id" value="<?php echo $selected ?>">
                        <select name="" id="" style="height: 3em; width: 10em;">
                            <option value="">---Chọn Hãng---</option>
                            <?php
                            foreach ($dataHang as $dh) {
                            ?>
                                <option value="<?php $dh['idBrand'] ?>"><?php echo $dh['nameBrand'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <?php
                        ?>
                        <button style="height: 3em; margin-left: 1em; width: 3em;" class="btnsearch">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>

                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($dataXe as $dx) {
            ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <div class="thumb-img">
                                <img src="./views/image/product/<?php echo $dx['urlImagePro'] ?>" alt="" width="300px" height="300px">
                            </div>
                        </div>
                        <div class="down-content">
                            <p>Hãng: <?php echo $dx['nameBrand'] ?></p>
                            <p>Tên xe: <?php echo $dx['nameProduct'] ?></p>
                            <p>Giá: <?php echo $dx['priceProduct'] ?></p>
                            <div class="text-button">
                                <a href="index.php?controller=sanpham&id=<?php echo $dx['idProduct'] ?>&action=getID">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
    <nav aria-label="Page navigation" style="display: flex; justify-content: center; align-items: center;">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
            for ($i = 1; $i <= $count; $i++) {
            ?>
                <li><a href="index.php?controller=sanpham&action=getAll&page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
            }

            ?>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</section>