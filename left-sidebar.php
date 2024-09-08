<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Purchase <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Purchase-Entry.php">Purchase Entry</a>
                                </li>
								<li>
                                    <a href="Purchase-Payment.php">Purchase Pending Payment</a>
                                </li>
                                <li>
                                    <a href="View-Purchase.php">View Purchase</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li <?php if((basename($_SERVER['PHP_SELF']) == "Sale-Entry-Upadte.php"))
								{
									echo "class='active'"; 
								} 
						?>>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Billing <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Sale-Entry.php">Billing Entry</a>
                                </li>
								<li>
                                    <a href="Sale-Payment.php">Billing Pending Payment</a>
                                </li>
								<li>
                                    <a href="View-Sales.php">View Billing</a>
                                </li>
								<!--<li>
                                    <a href="Sale-Entry-Return.php">Sale Entry Return</a>
                                </li>
								<li>
                                    <a href="View-Sales-Return.php">View Sale Return</a>
                                </li>-->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-clock-o fa-fw"></i> expenses <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Add-Expenses.php">Expenses Entry</a>
                                </li>
								<li>
                                    <a href="View-Expenses.php">View Expenses</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li 
						<?php if((basename($_SERVER['PHP_SELF']) == "View-Date-Wise-Purchase.php") || 
								(basename($_SERVER['PHP_SELF']) == "View-Company-Wise-Purchase.php") ||
								(basename($_SERVER['PHP_SELF']) == "View-Today-Wise-Purchase.php") ||
								(basename($_SERVER['PHP_SELF']) == "View-Date-Wise-Sale.php") ||
								(basename($_SERVER['PHP_SELF']) == "View-Customer-Wise-Sale.php") ||
								(basename($_SERVER['PHP_SELF']) == "View-Today-Wise-Sale.php") ||
								(basename($_SERVER['PHP_SELF']) == "Cash_Book.php")||
								(basename($_SERVER['PHP_SELF']) == "Day_Book.php")||
								(basename($_SERVER['PHP_SELF']) == "View-Stock-Report.php")||
								(basename($_SERVER['PHP_SELF']) == "View-Today-Total-Report.php")
								){
									echo "class='active'"; 
								} 
						?>>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Report <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="#">Purchase <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="View-Date-Wise-Purchase.php">Date Wise Purchase Report</a>
                                        </li>
                                        <li>
                                            <a href="View-Company-Wise-Purchase.php">Company Wise Purchase</a>
                                        </li>
                                        <li>
                                            <a href="View-Today-Wise-Purchase.php">Today Purchase Report</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								<li>
                                    <a href="#">Billing <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="View-Date-Wise-Sale.php">Date Wise Billing Report</a>
                                        </li>
                                        <li>
                                            <a href="View-Customer-Wise-Sale.php">Customer/Van Wise Billing</a>
                                        </li>
                                        <li>
                                            <a href="View-Today-Wise-Sale.php">Today Billing Report</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								<li>
                                    <a href="#">Account <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="Cash_Book.php">Cash Book</a>
                                        </li>
                                        <li>
                                            <a href="#">Bank Book</a>
                                        </li>
                                        <li>
                                            <a href="Day_Book.php">Day Book</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								<li>
                                     <a href="View-Stock-Report.php">Stock Report</a>
                                </li>
								<li>
                                     <a href="View-Today-Total-Report.php">Today Total Report</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li
						<?php if((basename($_SERVER['PHP_SELF']) == "Add-Company.php") || 
								(basename($_SERVER['PHP_SELF']) == "View-Company.php") ||
								(basename($_SERVER['PHP_SELF']) == "Edit-Company.php") ||
								(basename($_SERVER['PHP_SELF']) == "Add-Customer.php") ||
								(basename($_SERVER['PHP_SELF']) == "View-Customer.php") ||
								(basename($_SERVER['PHP_SELF']) == "Edit-Customer.php") ||
								(basename($_SERVER['PHP_SELF']) == "Add_Product.php") ||
								(basename($_SERVER['PHP_SELF']) == "View-Product.php") ||
								(basename($_SERVER['PHP_SELF']) == "Edit_Product.php") ||
								(basename($_SERVER['PHP_SELF']) == "Add_Category.php")||
								(basename($_SERVER['PHP_SELF']) == "View-Category.php")||
								(basename($_SERVER['PHP_SELF']) == "Edit_Category.php")||
								(basename($_SERVER['PHP_SELF']) == "Add-Shop.php")||
								(basename($_SERVER['PHP_SELF']) == "View-Shop.php")||
								(basename($_SERVER['PHP_SELF']) == "Edit-Shop.php")||
								(basename($_SERVER['PHP_SELF']) == "Create-Account.php")||
								(basename($_SERVER['PHP_SELF']) == "Edit-Account.php")||
								(basename($_SERVER['PHP_SELF']) == "View-Login-Account.php")
								){
									echo "class='active'"; 
								} 
						?>
						>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Master <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!--<li>
                                    <a href="#">Second Level Item</a>
                                </li>-->
                                <li <?php if((basename($_SERVER['PHP_SELF']) == "Edit-Company.php")){ echo "class='active'"; } ?>>
                                    <a href="#">Company <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="Add-Company.php">Add Company</a>
                                        </li>
                                        <li>
                                            <a href="View-Company.php">View Company</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								<li <?php if((basename($_SERVER['PHP_SELF']) == "Edit-Customer.php")){ echo "class='active'"; } ?>>
                                    <a href="#">Customer <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="Add-Customer.php">Add Customer</a>
                                        </li>
                                        <li>
                                            <a href="View-Customer.php">View Customer</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								<li <?php if((basename($_SERVER['PHP_SELF']) == "Edit_Product.php")){ echo "class='active'"; } ?>>
                                    <a href="#">Product <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="Add_Product.php">Add Product</a>
                                        </li>
                                        <li>
                                            <a href="View-Product.php">View Product</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								<li <?php if((basename($_SERVER['PHP_SELF']) == "Edit_Category.php")){ echo "class='active'"; } ?>>
                                    <a href="#">Category <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="Add_Category.php">Add Category</a>
                                        </li>
                                        <li>
                                            <a href="View-Category.php">View Category</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								<li <?php if((basename($_SERVER['PHP_SELF']) == "Edit-Shop.php")){ echo "class='active'"; } ?>>
                                    <a href="#">Shop/Business Details <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="Add-Shop.php">Add Shop/Business Details</a>
                                        </li>
                                        <li>
                                            <a href="View-Shop.php">View Shop/Business Details</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								<li <?php if((basename($_SERVER['PHP_SELF']) == "Edit-Account.php")){ echo "class='active'"; } ?>>
                                    <a href="#">Login Account <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="Create-Account.php">Add Login Account</a>
                                        </li>
                                        <li>
                                            <a href="View-Login-Account.php">View Login Account</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li
						<?php if((basename($_SERVER['PHP_SELF']) == "Add-Department.php") || 
								(basename($_SERVER['PHP_SELF']) == "Add-Employee.php") ||
								(basename($_SERVER['PHP_SELF']) == "Employee-Attendance.php") ||
								(basename($_SERVER['PHP_SELF']) == "Employee-List.php") 
								){
									echo "class='active'"; 
								} 
						?>
						>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> HR/Payroll <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="#">Employee Management <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="Add-Department.php">Add Department</a>
                                        </li>
                                        <li>
                                            <a href="Add-Employee.php">Add Employee</a>
                                        </li>
                                        <li>
                                            <a href="Employee-List.php">Employee List</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								<li>
                                    <a href="#">Payroll <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Salary Setting</a>
                                        </li>
                                        <li>
                                            <a href="#">Employee Salary</a>
                                        </li>
                                        <li>
                                            <a href="#">Advance Payments</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
								
								<li>
									<a href="#"><i class="fa fa-bullhorn fa-fw"></i> Attendance <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
											<a href="Employee-Attendance.php">Employee Attendance</a>
										</li>
										<li>
											<a href="Attendance-Member.php">View Attendance</a>
										</li>
									</ul>
									<!-- /.nav-second-level -->
								</li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						                     
					   					   
                        <li>
                            <a href="#"><i class="fa fa-envelope-o fa-fw"></i> SMS <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Send Single SMS</a>
                                </li>
                                <li>
                                    <a href="#">Send Member</a>
                                </li>
                                <li>
                                    <a href="S#">Send Employee</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Software Documentation <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a target="_blank" href="documentation-shop.pdf">Download Pdf Documentation</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
