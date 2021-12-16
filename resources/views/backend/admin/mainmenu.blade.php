<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="{{url('/dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Category</span></a>
                <ul>
                    <li><a class="submenu" href="{{url('/admin/category-create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Category</span></a></li>
                    <li><a class="submenu" href="{{url('/admin/category-show')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">All Category</span></a></li>
                </ul>
            </li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Brand</span></a>
                <ul>
                    <li><a class="submenu" href="{{url('/brands/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Brand</span></a></li>
                    <li><a class="submenu" href="{{url('/brands')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">All Brands</span></a></li>
                </ul>
            </li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Product</span></a>
                <ul>
                    <li><a class="submenu" href="{{url('/products/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Product</span></a></li>
                    <li><a class="submenu" href="{{url('/products')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">All Products</span></a></li>
                </ul>
            </li>



        </ul>
    </div>
</div>
