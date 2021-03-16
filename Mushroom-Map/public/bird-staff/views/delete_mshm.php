<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id_mshm'])) {
  redirect_to(url_for('/bird-staff/views/mushroomindex.php'));
}
$id = $_GET['id_mshm'];
$mushroom = Mushroom::find_by_id_mshm($id);
if($mushroom == false) {
  redirect_to(url_for('/bird-staff/views/mushroomindex.php'));
}

if(is_post_request()) {

  $result = $mushroom->delete_mshm();

  $_SESSION['message'] = 'The mushroom was deleted successfully.';
  redirect_to(url_for('/bird-staff/views/mushroomindex.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Mushroom'; ?>
<?php include(SHARED_PATH . '/bird-staff-header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/bird-staff/views/mushroomindex.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle delete">
    <h1>Delete Mushroom</h1>
    <p>Are you sure you want to delete this mushroom?</p>
    <p class="item"><?php echo h($mushroom->common_name_mshm); ?></p>

    <form action="<?php echo url_for('/bird-staff/views/delete_mshm.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Mushroom" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/bird-staff-footer.php'); ?>
