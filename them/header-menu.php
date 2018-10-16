<?php
session_start();
?>
<div class="row">
    <div class="col">
        <nav id="header"><?php if ( @$_SESSION['logged'] ) { ?>
                <div class="is-admin">
                    <div class="tac">
                        <p><?php echo $_SESSION['name'] . ' خوش آمدید ' ?>/
                            <a href="admin/admin.php"> ورود به صفحه مدیریت </a>/
                            <a href="admin/logout.php">خروج</a>
                        </p>

                    </div>
                </div>
			<?php } ?>
            <div class="top">
                <ul>
					<?php
					$sql    = "SELECT link, title,class FROM header";
					$result = $conn->query( $sql );
					if ( $result->num_rows > 0 ) {
						while ( $row = $result->fetch_assoc() ) {
							?>
                            <li><a href="<?php echo $row['link']; ?>"><i class="<?php echo $row['class']; ?>"
                                                                         data-toggle="tooltip" data-placement="bottom"
                                                                         title="<?php echo $row['title']; ?>"></i></a>
                            </li>
							<?php
						}
					}; ?>
                </ul>
            </div>
            <br>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php
                $sql2   = "SELECT link, title FROM topbar";
                $result = $conn->query( $sql2 );

                if ( $result->num_rows > 0 ) {
                    // output data of each row
                    while ( $row = $result->fetch_assoc() ) {
                        ?>
                        <a class="fa-md dropdown-item" href="<?php echo $row['link']; ?>"><?php echo $row["title"]; ?></a>

                        <?php
                    }
                } ?>
                </div>
            </div>
            <div class="bar">
                <ul>
                    <li>
                        <form class="form-inline" action="search.php" method="post">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input class="form-control form-control-sm ml-3 w-75" name="search" type="text" placeholder="Search" aria-label="Search">
                        </form>
                    </li>
					<?php
					$sql2   = "SELECT link, title FROM topbar";
					$result = $conn->query( $sql2 );

					if ( $result->num_rows > 0 ) {
						// output data of each row
						while ( $row = $result->fetch_assoc() ) {
							?>
                            <li><a class="fa-md" href="<?php echo $row['link']; ?>"><?php echo $row["title"]; ?></a>
                            </li>
							<?php
						}
					} ?>
                </ul>
            </div>
        </nav>
    </div>
</div>