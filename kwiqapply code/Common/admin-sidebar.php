    <nav id="sidebarMenu" class="" > 
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
        <div class="sidebar-header">
          <div class="nav-item">
              <a class="nav-link text-dark" href="admin-index.php">
                <span class="home"></span>
                  <i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard 
              </a>
          </div>
        </div>   
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="usermanage.php">
              <span data-feather="usermanage"></span>
              <i class="fa fa-user mr-2" aria-hidden="true"></i>User Management
            </a>
		      </li>
          <li class="nav-item">
            <a class="nav-link" href="clg_details.php">
              <span data-feather="collegedet"></span>
              <i class="fa fa-user-circle mr-2" aria-hidden="true"></i>College details
            </a>
          </li>
          

          <li class="nav-item">
            <a class="nav-link" href="clgadm_manage.php">
              <span data-feather="layers"></span>
              <i class="fa fa-key mr-2" aria-hidden="true"></i> College Admin Management
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="feedback.php">
              <span data-feather="feedback"></span>
              <i class="fa fa-book mr-2" aria-hidden="true"></i>Feedbacks
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <script>
        const toggleBtn = document.querySelector(".show-btn");
        const sidebar = document.querySelector(".sidebar");
        // undefined
        toggleBtn.addEventListener("click",function(){
            sidebar.classList.toggle("show-sidebar");
        });
    </script>