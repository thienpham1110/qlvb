<!-- Start Content Box -->

<div class="content-box-header">

<h3>Quản Lý Nơi Ban Hành</h3>
<h3>
    <?php
        if(isset($_SESSION['thongbaonoibanhanh'])){
            echo $_SESSION['thongbaonoibanhanh'];
            unset($_SESSION['thongbaonoibanhanh']);
        }	
    ?>  
</h3>
<ul class="content-box-tabs">
    <li><a href="#tab1" class="default-tab">Danh Mục Nơi Ban Hành</a></li> <!-- href must be unique and match the id of target div -->
    <li><a href="#tab2">Thêm Nơi Ban Hành</a></li>
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
               <th>Mã Nơi Ban Hành</th>
               <th>Tên Nơi Ban Hành</th>
               
            </tr>

        </thead>
        <tbody>
            <?php
foreach ($data as $key => $value) {
?>
            <tr>
                <td><input type="checkbox" /></td>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $value['manoibanhanh'] ?></td>
                <td><?php echo $value['tennoibanhanh'] ?></td>
                <td>
                    <!-- Icons -->
                     <a href="<?php echo BASE_URL ?>/index.php?ctrl=admin_noibanhanh&func=edit&manoibanhanh=<?php echo $value['manoibanhanh'] ?>" title="Edit Meta">
                         <img src="<?php echo BASE_URL ?>/admincp/resources/images/icons/pencil.png" alt="Edit" />
                     </a>
                     <a href="#" title="Delete" onClick="Deletenoibanhanh('<?php echo $value['manoibanhanh'] ?>'); ">
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
<?php include "noibanhanh_add.php"; ?>

</div> <!-- End #tab2 -->

</div> <!-- End .content-box-content -->

<script type="text/javascript">
function Deletenoibanhanh(id)
{
if (confirm("Bạn có muốn xóa?"))
{
window.location='<?php echo BASE_URL ?>/index.php?ctrl=admin_noibanhanh&func=deleteNBH&manoibanhanh='+id;
}
else return false;
}
</script>