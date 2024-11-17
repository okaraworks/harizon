<div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">
                      <?php
                        $lastUser=Functions::countNewUsers();
                        foreach ($lastUser as $key => $value) {
                          # code...
                          echo $value['total'];
                        }
                      ?>
                    </p>
                    <p class="announcement-text">New Users</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      <a href="users">View</a>
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-check fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">
                      <?php
                        $Users=Functions::countActiveUsers();
                        foreach ($Users as $key => $value) {
                          # code...
                          echo $value['total'];
                        }
                                              ?>
                    </p>
                    <p class="announcement-text">Active Users</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      <a href="users-logged">View</a>
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">
                      <?php
                        $lastUser=Functions::countNewMembers();
                        foreach ($lastUser as $key => $value) {
                          # code...
                          echo $value['total'];
                        }
                      ?>
                    </p>
                    <p class="announcement-text">New Members</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      <a href="registered~persons">View</a>
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
          
                  <div class="col-md-12">
                    <p class="announcement-heading">
                      <?php
                        $amount= Contributions::totalContributions();
                        foreach ($amount as $key => $value) {
                          # code...
                          echo number_format($value['total'], 2);
                        }
                      ?>
                    </p>
                    <p class="announcement-text">Total Monthly Contributions</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      <a href="users">View</a>
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>