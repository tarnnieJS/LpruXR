 <section class="section">
    <form id="register" action="dist/admin/save_register.php" method="post">
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Register details</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <input class="input" require type="text" name="term" placeholder="Term">
                </div>
              </div>
              <div class="field is-narrow">
                <div class="control">
                  <div  class="select is-fullwidth">
                    <select  name="s_group" >
                      <option  value="">Group</option>
                      <?php
                  
                      $records = mysqli_query($dbconnect, "SELECT s_group From student");  // Use select query here 
                      while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['s_group'] . "'>" . $data['s_group'] . "</option>";  // displaying data in option menu
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="field is-narrow">
                <div class="control">
                  <div>

                  </div>
                  <div  class="select is-fullwidth">
                    <select  name="subject_id" >
                      <option value="" >Select subject</option>
                      <?php
                      $records = mysqli_query($dbconnect, "SELECT subject_id,subject_name From subject");  // Use select query here 
                      while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['subject_id'] . "'>" . $data['subject_id'] ." : ".$data['subject_name']. "</option>";  // displaying data in option menu
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
             
              <div class="field is-narrow">
                <div class="control">
                  <div  class="select is-fullwidth">
                    <select  name="user_id" >
                      <option value=""> Teacher name</option>
                      <?php
                     
                      $records = mysqli_query($dbconnect, "SELECT * From user");  // Use select query here 
                      while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['ID'] . "'>" . $data['Fullname'] . "</option>";  // displaying data in option menu
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              
            </div>
          </div> 
          <div class="field is-horizontal">
            <div class="field-label">     
            </div>
            <div class="field-body">
              <div class="field">
                <div class="field is-grouped">
                  <div class="control">
                    <button type="submit" class="button is-primary">
                      <span>SAVE</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="column  table-wrapper-scroll-y my-custom-scrollbar ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="register_data" class="table is-fullwidth is-scrollable  is-bordered is-striped   ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Term</th>
                                    <th>Group</th>
                                    <th>Subject ID</th>
                                    <th>Subject name</th>
                                    <th>Teacher ID</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    </body>

    </html>
<?php?>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        var dataTable = $('#register_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "dist/admin/fetch_register.php",
                type: "POST"
            }
        });

        $('#register_data').on('draw.dt', function() {
            $('#register_data').Tabledit({
                url: 'dist/admin/action_register.php',
                dataType: 'json',
                columns: {
                    identifier: [0, 'r_id'],
                    editable: [
                        [1, 's_group'],
                        [2, 'term'],
                        [3, 'subject_id'],
                        [4, 'subject_name'],
                        [5, 'Fullname'],
                   
                    ]
                },
                restoreButton: false,
                onSuccess: function(data, textStatus, jqXHR) {
                    if (data.action == 'delete') {
                        $('#' + data.id).remove();
                        $('#register_data').DataTable().ajax.reload();
                    }
                }
            });
        });

    });
</script>