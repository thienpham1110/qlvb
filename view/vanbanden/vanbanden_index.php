<!-- Start Content Box -->

<div class="content-box-header">

    <h3>Văn Bản Đến</h3>

    <ul class="content-box-tabs">
        <li><a href="#tab1" class="default-tab">Danh Mục Văn Bản Đến</a></li>
        <!-- href must be unique and match the id of target div -->
        <li><a href="#tab2">Thêm Mới</a></li>
    </ul>

    <div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

    <div class="tab-content default-tab" id="tab1">
        <table id="tbl_book">

            <thead>
                <tr>
                    <th><input class="check-all" type="checkbox" /></th>
                    <th>STT</th>
                    <th>Số Văn Bản</th>
                    <th>Trích Yếu</th>
                    <th>Ngày Ban Hành</th>
                    <th>Thao Tác</th>
                </tr>

            </thead>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="bulk-actions align-left"></div>
                        <h3>Trang:
                            <?php
                for($i=1;$i<=$tongtrang;$i++)
                    echo '<a href="index.php?ctrl=admin&page='.$i.'"> '.$i.' </a> ';
              ?>
                        </h3>
                        <div class="pagination">
                        </div> <!-- End .pagination -->
                        <div class="clear"></div>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php
foreach ($data as $key => $value) {
?>
                <tr>
                    
                    <td><input type="checkbox" /></td>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $value['sovanban'] ?></td>
                    <td><?php echo $value['trichyeu'] ?></td>
                    <td><?php echo $value['ngaybanhanh'] ?></td>
                    
                    <!-- <td>
                        <img class=book src="<?php echo BASE_URL ?>/images/mon/<?php echo $value['hinh'] ?>">
                    </td> -->
                    <td>
                        <!-- Icons -->
                        <a href="<?php echo BASE_URL ?>/index.php?ctrl=admin_vanbanden&func=detail&sovanban=<?php echo $value['sovanban'] ?>"
                            title="Detail">
                            <img src="<?php echo BASE_URL ?>/admincp/resources/images/icons/information.png" alt="Detail" />
                        </a>
                        <a href="<?php echo BASE_URL ?>/index.php?ctrl=admin_vanbanden&func=edit&sovanban=<?php echo $value['sovanban'] ?>"
                            title="Edit">
                            <img src="<?php echo BASE_URL ?>/admincp/resources/images/icons/pencil.png" alt="Edit" />
                        </a>
                        <a href="#" title="Delete" onClick="Deletevb('<?php echo $value['sovanban'] ?>'); ">
                            <img src="<?php echo BASE_URL ?>/admincp/resources/images/icons/cross.png" alt="Delete" />
                        </a>
                    </td>
                </tr>
                <?php
}
?>

            </tbody>

        </table>

    </div> <!-- End #tab1 -->

    <div class="tab-content" id="tab2">
        <?php include "vanbanden_add.php"; ?>

    </div> <!-- End #tab2 -->

</div> <!-- End .content-box-content -->

<script type="text/javascript">
function Deletevb(id) {
    if (confirm("Ban chac chan muon xoa?")) {
        window.location = '<?php echo BASE_URL ?>/index.php?ctrl=admin&func=deletevbn&sovanban=' + id;
    } else return false;
}
</script>