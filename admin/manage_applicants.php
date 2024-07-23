<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');




if (isset($_POST['approve']) || isset($_POST['reject'])) {
    $application_id = $_POST['application_id'];
    $message = $_POST['message'];
    $status = isset($_POST['approve']) ? 1 : 2;

    $sql = "UPDATE applications SET status = $status, message = '$message' WHERE a_id = $application_id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
 
        $_SESSION['status'] = $status == 1 ? "Application approved successfully." : "Application rejected successfully.";
    } else {
        $_SESSION['status'] = "Error updating application status: " . mysqli_error($conn);
    }
}
?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Applications</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Applications</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Applications</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo '<div class="alert alert-primary" role="alert">' . $_SESSION['status'] . '</div>';
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>Education</th>
                                    <th>Resume</th>
                                    <th>Status</th>
                                    <th>Message</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM applications";
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                    foreach ($res as $value) {
                                        // Correcting the resume path for view and download links
                                        $resume_path = '../' . $value['resume'];
                                ?>
                                        <tr>
                                            <td><?php echo $value['a_id'] ?></td>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['address'] ?></td>
                                            <td><?php echo $value['education'] ?></td>
                                            <td>
                                                <a href="<?php echo $resume_path; ?>" target="_blank">View</a> | 
                                                <a href="<?php echo $resume_path; ?>" download>Download</a>
                                            </td>
                                            <td>
                                                <?php 
                                                switch ($value['status']) {
                                                    case 1:
                                                        echo 'Approved';
                                                        break;
                                                    case 2:
                                                        echo 'Rejected';
                                                        break;
                                                    default:
                                                        echo 'Pending';
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $value['message'] ?></td>
                                            <td>
                                                <form action="" method="post" id="form-<?php echo $value['a_id']; ?>">
                                                    <input type="hidden" name="application_id" value="<?php echo $value['a_id']; ?>">
                                                    <button type="button" class="btn btn-sm btn-primary approve-btn" data-id="<?php echo $value['a_id']; ?>">Approve</button>
                                                    <button type="button" class="btn btn-sm btn-danger reject-btn" data-id="<?php echo $value['a_id']; ?>">Reject</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Approving Application -->
<div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="acceptModalLabel">Approve Application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="acceptForm" action="" method="post">
        <div class="modal-body">
          <input type="hidden" name="application_id" id="acceptApplicationId">
          <div class="mb-3">
            <label for="acceptMessage" class="form-label">Message</label>
            <textarea class="form-control" id="acceptMessage" name="message" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="approve">Approve</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for Rejecting Application -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectModalLabel">Reject Application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="rejectForm" action="" method="post">
        <div class="modal-body">
          <input type="hidden" name="application_id" id="rejectApplicationId">
          <div class="mb-3">
            <label for="rejectMessage" class="form-label">Message</label>
            <textarea class="form-control" id="rejectMessage" name="message" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="reject">Reject</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include('includes/footer.php');
include('includes/script.php');
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const acceptButtons = document.querySelectorAll('.approve-btn');
    const rejectButtons = document.querySelectorAll('.reject-btn');

    acceptButtons.forEach(button => {
      button.addEventListener('click', function () {
        const applicationId = this.dataset.id;
        document.getElementById('acceptApplicationId').value = applicationId;
        new bootstrap.Modal(document.getElementById('acceptModal')).show();
      });
    });

    rejectButtons.forEach(button => {
      button.addEventListener('click', function () {
        const applicationId = this.dataset.id;
        document.getElementById('rejectApplicationId').value = applicationId;
        new bootstrap.Modal(document.getElementById('rejectModal')).show();
      });
    });
  });
</script>
