


<nav class="navbar navbar-default navbar-mobile    bootsnav">
    <div class="container">      
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars back"></i><p style="font-size: 12px;line-height: 10px; color: #000;">MENU</p>
            </button>
             <a class="navbar-brand" href="<?=base_url()?>" title=""><img src="images/logo01.jpg" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">

            <ul class="nav navbar-nav navbar-right">

                <li><a href="<?=base_url()?>" id="Home" class="text-uppercase">Home</a></li>                    
                <li><a href="<?=base_url('service')?>" id="SERVICE"  class="text-uppercase">OUR SERVICE</a></li>
                <li><a href="<?=base_url('contact')?>" id="Contact"  class="text-uppercase">Contact Us</a></li>
            </ul>
            <div class="hidden-lg hidden-md" style="background:0;padding:5px 0;margin-top:0">
                <table width="100%" border="0" style="margin-bottom:20px;border-bottom:solid 1px #e0e0e0">
                    <tbody>
                        <tr>
                            <td width="29%" align="right" valign="middle" style="padding:8px 5px 8px 5px">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <img class="img-social" src="images/so01.png?v=1001" alt="facebook" title="" />
                                </a>
                            </td>
                            <td width="2%">&nbsp;</td>
                            <td width="69%" align="left" valign="middle">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <span style="color:#fff">Facebook</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="29%" align="right" valign="middle" style="padding:8px 5px 8px 5px">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <img class="img-social" src="images/so02.png?v=1001" alt="facebook" title="" />
                                </a>
                            </td>
                            <td width="2%">&nbsp;</td>
                            <td width="69%" align="left" valign="middle">
                                <a href="https://line.me/th/" target="_blank">
                                    <span style="color:#fff">Line</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" style="padding:8px 5px 8px 5px">
                                <a href="https://www.instagram.com/" target="_blank">
                                    <img class="img-social" src="images/so03.png?v=1001" alt="Instagram" title="" />
                                </a>
                            </td>
                            <td width="5%">&nbsp;</td>
                            <td align="left" valign="middle">
                                <a href="https://www.instagram.com/" target="_blank">
                                    <span style="color:#fff">Instagram</span>
                                </a>
                            </td>
                        </tr>
                        <tr style="margin-bottom:30px">
                            <td align="right" valign="middle" style="padding:8px 5px 8px 5px">
                                <a href="https://www.youtube.com/" target="_blank">
                                    <img class="img-social" src="images/so04.png?v=1001" alt="youtube" title="" />
                                </a>
                            </td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle">
                                <a href="https://www.youtube.com/" target="_blank">
                                    <span style="color:#fff">youtube</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" border="0" style="margin-top:20px">
                    <tbody width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#fff;font-size:10px;line-height:1">
                        <tr>
                            <td width="31%" rowspan="2" align="right" valign="middle" style="padding:5px 5px 15px 5px">
                                <img src="images/f1.png?v=1001" width="33" height="33" alt="" title="" />&nbsp;&nbsp;
                            </td>
                            <td width="2%" rowspan="2" align="right">&nbsp;</td>
                            <td width="67%" align="left" valign="bottom">Today</td>
                        </tr>
                        <tr>
                            <td style="padding-top:5px" align="left" valign="top"><?=counterDaily()["Today"];?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px 5px 15px 5px" rowspan="2" align="right" valign="middle">
                                <img src="images/f2.png?v=1001" width="33" height="33" alt="" title="" />&nbsp;&nbsp;
                            </td>
                            <td rowspan="2" align="right">&nbsp;</td>
                            <td align="left" valign="bottom">This Month</td>
                        </tr>
                        <tr>
                            <td style="padding-top:5px" align="left" valign="top"><?=counterDaily()["ThisMonth"];?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px 5px 15px 5px" rowspan="2" align="right" valign="middle">
                                <img src="images/f3.png?v=1001" width="33" height="33" alt="" title="" />&nbsp;&nbsp;
                            </td>
                            <td rowspan="2" align="right">&nbsp;</td>
                            <td align="left" valign="bottom">Total</td>
                        </tr>
                        <tr>
                            <td style="padding-top:5px" align="left" valign="top"><?=counterDaily()["ThisTotal"];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.navbar-collapse -->
    </div>   
</nav>