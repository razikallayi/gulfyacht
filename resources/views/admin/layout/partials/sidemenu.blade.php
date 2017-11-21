<li id="mnu-dashboard" class="header">
  <a href="{{url('admin/dashboard')}}">
   <span>DASHBOARD</span>
 </a>
</li>



<!-- ################# brand ################## -->
<li id="mnu-brand">
  <a href="javascript:void(0);" class="menu-toggle">
   <span>Brand</span>
 </a>
 <ul class="ml-menu">
  <li  class="add">
    <a href="{{url('admin/brands/add')}}" class="">
      <span>Add Brand</span>
    </a>
  </li>
  <li  class="manage">
    <a href="{{url('admin/brands')}}" class="">
      <span>Manage Brand</span>
    </a>
  </li>
  <li  class="sort">
    <a href="{{url('admin/brands/sort')}}" class="">
      <span>Sort Brand</span>
    </a>
  </li>
  <li  class="add-product">
    <a href="{{url('admin/products/add')}}" class="">
      <span>Add Product</span>
    </a>
  </li>
  <li  class="manage-product">
    <a href="{{url('admin/products')}}" class="">
      <span>Manage Product</span>
    </a>
  </li>
</ul>
</li>



<!-- ################# boat ################## -->
<li id="mnu-boat">
  <a href="javascript:void(0);" class="menu-toggle">
   <span>Boat</span>
 </a>
 <ul class="ml-menu">
  <li  class="add-boats">
    <a href="{{url('admin/boats/add')}}" class="">
      <span>Add Boat</span>
    </a>
  </li>
  <li  class="manage-boats">
    <a href="{{url('admin/boats')}}" class="">
      <span>Manage Boat</span>
    </a>
  </li>

  <li  class="add-inventory">
    <a href="{{url('admin/boats/add?menu=inventory')}}" class="">
      <span>Add Inventory</span>
    </a>
  </li>
  <li  class="manage-inventory">
    <a href="{{url('admin/boats?menu=inventory')}}" class="">
      <span>Manage Inventory</span>
    </a>
  </li>


</ul>
</li>