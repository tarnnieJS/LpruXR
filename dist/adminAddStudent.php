<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LpruX - Assignment - Create</title>
  <link rel="stylesheet" href="css/main.css">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="app">
    <aside class="aside is-placed-left is-expanded">
      <div class="aside-tools">
        <div class="aside-tools-label">
          <span><b>Lpru</b>X</span>
        </div>
      </div>
      <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
          <li>
            <a href="index.html" class="has-icon">
              <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
              <span class="menu-item-label">ติดตามงาน</span>
            </a>
          </li>
        </ul>
        <p class="menu-label">Assignment</p>
        <ul class="menu-list">
          <li>
            <a href="create.html" class="has-icon">
              <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
              <span class="menu-item-label">สร้างหัวข้องาน</span>
            </a>
          </li>
          <li>
            <a href="assignment.html" class="is-active has-icon">
              <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
              <span class="menu-item-label">มอบหมายงาน</span>
            </a>
          </li>
          <li>
            <a href="forms.html" class="is-active has-icon">
              <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
              <span class="menu-item-label">สถานะการส่งงาน
              </span>
            </a>
          </li>
          <p class="menu-label">Management</p>
          <li>
            <a href="https://admin-one-html.justboil.me/" target="_blank" class="has-icon">
              <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
              <span class="menu-item-label">การลงทะเบียน</span>
            </a>
          </li>
          <br> <br> <br> <br> <br>
          <li>
            <a href="https://justboil.me/bulma-admin-template/one" class="has-icon">
              <span class="icon"><i class="mdi mdi-help-circle"></i></span>
              <span class="menu-item-label">ออกจากระบบ</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
    <!-- End side menu -->

    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>Admin</li>
              <li>Add Student </li>
            </ul>
          </div>
        </div>
      </div>
  </div>
  </section>
  <section class="hero is-hero-bar">
    <div class="hero-body">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <h1 class="title">
              Subject
            </h1>
          </div>
        </div>
        <div class="level-right" style="display: none;">
          <div class="level-item"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section is-main-section">
    <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          Forms
        </p>
      </header>
      <div class="card-content">
        <form action="save_student.php" method="post">

          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Add Student</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <input class="input is-static" type="text" name="studentName" placeholder="เพิ่มนักเรียน">
                </div>
                </p>
              </div>
            </div>
          </div>
          <hr>
          <div class="field is-horizontal">
            <div class="field-label">
              <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
              <div class="field">
                <div class="field is-grouped">
                  <div class="control">
                    <button type="submit" class="button is-primary">
                      <span>Submit</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="field-body">
          <div class="field">
            <div class="field is-grouped">
              <div class="control">
              </div>
            </div>
          </div>
        </div>
        <hr>

        <?PHP
        include "connectDB.php"; // เรียกใช้งาน ConnectDB.php
        $sql = mysqli_query($dbconnect, "SELECT * FROM subject");
        ?>
        <p align="center"><b>แสดงข้อมูลรายวิชาทั้งหมด</b>
          <div class="card-content">
            <div class="table-container">
              <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
                <thead>
                  <tr>

                    </th>
                    <th></th>
                    <th>Subject name</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th></th>
                  </tr>
                </thead>
            </div>
          </div>
          <div class="table-container">
            <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
              <thead>
                <tr>

                  </th>
                  <?PHP
                  while ($result = mysqli_fetch_array($sql)) {

                    echo "<tr>";
                    echo "<td  width=\"500\" >" . $result['subject_name'] . "</td>";
                    echo "<td  width=\"60\"> <a href='subjectDel.php?ID=" . $result['subject_id'] . "'>ลบ</a></td>";
                    echo "</tr>";
                  }
                  mysqli_close($dbconnect);
                  ?>

            </table>

          </div>


      </div>
  </section>
  <script type="text/javascript" src="js/main.js"></script>
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>

</html>