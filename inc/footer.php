
<!-- Change Admin Panel -->
<form action="changeadmin.php" method="POST" name="create">
    <div class="modal fade" id="changemodal" tabindex="-1" role="dialog" aria-labelledby="createmodalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="xmodalLabel">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="cancel">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <div class="modal-body">
            <div class="md-form mt-0">
              <span>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="username">Username</label>
                  <input type="text" id="username" name="username" class="form-control " required>
                </div>
              </div> 
  <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Old Password</label>
                  <input type="text" id="opassword" name="opassword" class="form-control " required>
                </div>
              </div>
            </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="password">New Password</label>
                  <input type="password" id="password" name="password" class="form-control " required>
                </div>
              </div>
                  <input type="submit" value="Change" class="btn btn-primary px-3 py-3">
                </div>
            </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
    </html>