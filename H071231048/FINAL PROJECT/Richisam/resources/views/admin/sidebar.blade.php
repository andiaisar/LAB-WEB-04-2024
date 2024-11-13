<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('admincss/img/img-01.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Ucup Bin Selamet</h1>
          <p>Web Designer</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
            <li class="active">
                <a href="index.html"><i class="icon-home"></i>Home</a>
            </li>
            <li>
                <a href="{{ url('view_catagory') }}"> <i class="icon-grid"></i>Catagory </a>
            </li>
            <li>
                <a href="charts.html"> <i class="fa fa-bar-chart"></i>Products</a>
            </li>
              <li>
                <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"><i class="icon-windows"></i>Example dropdown </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="#">Page</a></li>
                  <li><a href="#">Page</a></li>
                  <li><a href="#">Page</a></li>
                </ul>
              </li>
      </ul>
    </nav>