<?php
    session_start();

    function refreshCryptocurrency() {
        $url = "http://localhost:3001/crypto-list";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $_SESSION["lastUpdated"] = $data["info"]["lastUpdated"];
        $_SESSION["cryptocurrency"] = $data["cryptocurrency"];
    };

    refreshCryptocurrency();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cryptune</title>

    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
    <body>
        <nav>
            <div class="navbar on-start-1">
                <div class="nav-logo">
                    <a href="#">
                        <img src="images/logo.webp" alt="Logo firmy Cryptune">
                        <p>Cryptune</p>
                    </a>
                </div>
                <div class="nav-options">
                    <ul class="options-list">
                        <li class="list-item">
                            <a href="#">Strona główna</a>
                        </li>
                        <li class="list-item">
                            <a href="#">Kup kryptowaluty</a>
                        </li>
                        <li class="list-item">
                            <a href="#">Market</a>
                        </li>
                        <li class="list-item">
                            <a href="#">Portfel</a>
                        </li>
                        <li class="list-item">
                            <a href="#">Blog</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-login">
                    <a href="#">Zaloguj się</a>
                </div>
                <div class="nav-menu">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </nav>

        <section>
            <div class="main">
                <div class="container on-start-2">
                    <div class="container-left">
                        <h2>Kupuj i sprzedawaj aktywa cyfrowe w Cryptune</h2>
                <p>Zanurz się w świat cyfrowych możliwości – odkryj nowe horyzonty inwestycji i zbuduj swoją przyszłość już teraz!</p>
                    </div>
                    <div class="container-right">
                        <img src="images/banner1.webp" alt="Banner firmy Cryptune" width="100%" height="auto">
                    </div>
                </div>
            </div>

            <div class="crypto">
                <div class="crypto-box on-start-2">
                    <table class="box-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nazwa</th>
                                <th>Cena</th>
                                <th>1h %</th>
                                <th>24h %</th>
                                <th>7d %</th>
                                <th>Kapitalyzacja rynkowa</th>
                                <th>Ostatnie 7 dni</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="currency-name">
                                        <img src="images/bitcoin.svg" alt="Logo bitcoin" class="cn-logo">
                                        <p class="cn-name">Bitcoin</p>
                                        <p class="cn-id">BTC</p>
                                    </div>
                                </td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["bitcoin"]["price"], 2, ".", ",")?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["bitcoin"]["color_1h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["bitcoin"]["change_1h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["bitcoin"]["change_1h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["bitcoin"]["color_24h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["bitcoin"]["change_24h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["bitcoin"]["change_24h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["bitcoin"]["color_7d"]?>;"><?php echo (($_SESSION["cryptocurrency"]["bitcoin"]["change_7d"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["bitcoin"]["change_7d"], 2))."%"?></td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["bitcoin"]["market_cap"], 0, "", ",")?></td>
                                <td>
                                    <img src="http://localhost:3001/crypto-chart/bitcoin" alt="Graph">
                                </td>
                            </tr>
    
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="currency-name">
                                        <img src="images/ethereum.svg" alt="Logo ethereum" class="cn-logo">
                                        <p class="cn-name">Ethereum</p>
                                        <p class="cn-id">ETH</p>
                                    </div>
                                </td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["ethereum"]["price"], 2, ".", ",")?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["ethereum"]["color_1h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["ethereum"]["change_1h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["ethereum"]["change_1h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["ethereum"]["color_24h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["ethereum"]["change_24h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["ethereum"]["change_24h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["ethereum"]["color_7d"]?>;"><?php echo (($_SESSION["cryptocurrency"]["ethereum"]["change_7d"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["ethereum"]["change_7d"], 2))."%"?></td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["ethereum"]["market_cap"], 0, "", ",")?></td>
                                <td>
                                    <img src="http://localhost:3001/crypto-chart/ethereum" alt="Graph">
                                </td>
                            </tr>
    
                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="currency-name">
                                        <img src="images/ripple.svg" alt="Logo ripple" class="cn-logo">
                                        <p class="cn-name">Ripple</p>
                                        <p class="cn-id">XRP</p>
                                    </div>
                                </td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["ripple"]["price"], 2, ".", ",")?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["ripple"]["color_1h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["ripple"]["change_1h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["ripple"]["change_1h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["ripple"]["color_24h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["ripple"]["change_24h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["ripple"]["change_24h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["ripple"]["color_7d"]?>;"><?php echo (($_SESSION["cryptocurrency"]["ripple"]["change_7d"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["ripple"]["change_7d"], 2))."%"?></td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["ripple"]["market_cap"], 0, "", ",")?></td>
                                <td>
                                    <img src="http://localhost:3001/crypto-chart/ripple" alt="Graph">
                                </td>
                            </tr>
    
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="currency-name">
                                        <img src="images/dogecoin.svg" alt="Logo dogecoin" class="cn-logo">
                                        <p class="cn-name">Dogecoin</p>
                                        <p class="cn-id">DOGE</p>
                                    </div>
                                </td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["dogecoin"]["price"], 2, ".", ",")?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["dogecoin"]["color_1h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["dogecoin"]["change_1h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["dogecoin"]["change_1h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["dogecoin"]["color_24h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["dogecoin"]["change_24h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["dogecoin"]["change_24h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["dogecoin"]["color_7d"]?>;"><?php echo (($_SESSION["cryptocurrency"]["dogecoin"]["change_7d"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["dogecoin"]["change_7d"], 2))."%"?></td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["dogecoin"]["market_cap"], 0, "", ",")?></td>
                                <td>
                                    <img src="http://localhost:3001/crypto-chart/dogecoin" alt="Graph">
                                </td>
                            </tr>
    
                            <tr>
                                <td>5</td>
                                <td>
                                    <div class="currency-name">
                                        <img src="images/litecoin.svg" alt="Logo litecoin" class="cn-logo">
                                        <p class="cn-name">Litecoin</p>
                                        <p class="cn-id">LTH</p>
                                    </div>
                                </td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["litecoin"]["price"], 2, ".", ",")?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["litecoin"]["color_1h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["litecoin"]["change_1h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["litecoin"]["change_1h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["litecoin"]["color_24h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["litecoin"]["change_24h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["litecoin"]["change_24h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["litecoin"]["color_7d"]?>;"><?php echo (($_SESSION["cryptocurrency"]["litecoin"]["change_7d"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["litecoin"]["change_7d"], 2))."%"?></td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["litecoin"]["market_cap"], 0, "", ",")?></td>
                                <td>
                                    <img src="http://localhost:3001/crypto-chart/litecoin" alt="Graph">
                                </td>
                            </tr>
    
                            <tr>
                                <td>6</td>
                                <td>
                                    <div class="currency-name">
                                        <img src="images/tether.svg" alt="Logo tether" class="cn-logo">
                                        <p class="cn-name">Tether</p>
                                        <p class="cn-id">USDT</p>
                                    </div>
                                </td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["tether"]["price"], 2, ".", ",")?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["tether"]["color_1h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["tether"]["change_1h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["tether"]["change_1h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["tether"]["color_24h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["tether"]["change_24h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["tether"]["change_24h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["tether"]["color_7d"]?>;"><?php echo (($_SESSION["cryptocurrency"]["tether"]["change_7d"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["tether"]["change_7d"], 2))."%"?></td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["tether"]["market_cap"], 0, "", ",")?></td>
                                <td>
                                    <img src="http://localhost:3001/crypto-chart/tether" alt="Graph">
                                </td>
                            </tr>
    
                            <tr>
                                <td>7</td>
                                <td>
                                    <div class="currency-name">
                                        <img src="images/binancecoin.svg" alt="Logo bnb" class="cn-logo">
                                        <p class="cn-name">BNB</p>
                                        <p class="cn-id">BNB</p>
                                    </div>
                                </td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["binancecoin"]["price"], 2, ".", ",")?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["binancecoin"]["color_1h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["binancecoin"]["change_1h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["binancecoin"]["change_1h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["binancecoin"]["color_24h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["binancecoin"]["change_24h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["binancecoin"]["change_24h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["binancecoin"]["color_7d"]?>;"><?php echo (($_SESSION["cryptocurrency"]["binancecoin"]["change_7d"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["binancecoin"]["change_7d"], 2))."%"?></td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["binancecoin"]["market_cap"], 0, "", ",")?></td>
                                <td>
                                    <img src="http://localhost:3001/crypto-chart/binancecoin" alt="Graph">
                                </td>
                            </tr>
    
                            <tr>
                                <td>8</td>
                                <td>
                                    <div class="currency-name">
                                        <img src="images/solana.svg" alt="Logo solana" class="cn-logo">
                                        <p class="cn-name">Solana</p>
                                        <p class="cn-id">SOL</p>
                                    </div>
                                </td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["solana"]["price"], 2, ".", ",")?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["solana"]["color_1h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["solana"]["change_1h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["solana"]["change_1h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["solana"]["color_24h"]?>;"><?php echo (($_SESSION["cryptocurrency"]["solana"]["change_24h"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["solana"]["change_24h"], 2))."%"?></td>
                                <td style="color: <?php echo $_SESSION["cryptocurrency"]["solana"]["color_7d"]?>;"><?php echo (($_SESSION["cryptocurrency"]["solana"]["change_7d"] > 0) ? "+" : "").htmlspecialchars(number_format($_SESSION["cryptocurrency"]["solana"]["change_7d"], 2))."%"?></td>
                                <td><?php echo "$".number_format($_SESSION["cryptocurrency"]["solana"]["market_cap"], 0, "", ",")?></td>
                                <td>
                                    <img src="http://localhost:3001/crypto-chart/solana" alt="Graph">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="lastupdated">
                        <p>Ostatnia aktualizacja: <?php echo $_SESSION["lastUpdated"]?></p>
                    </div>
                </div>
            </div>

            <div class="about">
                <div class="about-box">
                    <div class="box-left">
                        <h1>Czym zajmuję się Cryptune?</h1>
                        <div class="left-checkbox">
                            <div class="checkbox-title">
                                <i class="fas fa-chart-line"></i>
                                <p><strong>Kursy kryptowalut w czasie rzeczywistym</strong></p> 
                            </div>
                            <p class="checkbox-desc">
                                Nasza firma udostępnia kursy kryptowalut w czasie rzeczywistym w 32 walutach świata wraz z ukazaną zmianą procentową wartości danego aktywa cyfrowego.
                            </p>
                        </div>

                        <div class="left-checkbox">
                            <div class="checkbox-title">
                                <i class="fas fa-wallet"></i>
                                <p><strong>Portfel kryptowalut</strong></p>
                            </div>
                            <p class="checkbox-desc">
                                Przechowuj u nas bezpiecznie swoje kryptowaluty w wirtualnym portfelu nie martwiąc się o kradzież lub zgubienie nośnika, na którym przechowujesz swoje aktywa.
                            </p>
                        </div>

                        <div class="left-checkbox">
                            <div class="checkbox-title">
                                <i class="fas fa-exchange-alt"></i>
                                <p><strong>Darmowe transfery</strong></p>
                            </div>
                            <p class="checkbox-desc">
                                Płać i wymieniaj swoje aktywa cyfrowe za pomocą naszego portalu w oparcie o portfel wirtualny, nie martwiąc się o wysokie oprocentowanie transakcji - <strong>u nas oprocentowanie transferu jest zerowe!
                            </p>
                        </div>
                    </div>
                    <div class="box-right">
                        <img src="images/banner2.webp" alt="Banner firmy Cryptune">
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="footer-container">
                <div class="footer-box1">
                    <div class="box1-logo">
                        <a href="#">
                            <img src="images/logo.webp" alt="Logo firmy Cryptune">
                            <p>Cryptune</p>
                        </a>
                    </div>
                    <div class="box1-address">
                        <p>+48 123 456 789</p>
                        <p>kontakt@cryptune.pl</p>
                        <p>ul. xxxxxx xxxxx 12/3, 00-000 Warszawa</p>
                    </div>
                </div>
                <div class="footer-box2">
                    <div class="box2-line">
                        <p><strong>USŁUGI</strong></p>
                        <a href="#">Kup Kryptowaluty</a>
                        <a href="#">Market</a>
                        <a href="#">Program Partnerski</a>
                        <a href="#">API</a>
                        <a href="#">Developer Docs</a>
                    </div>
                    <div class="box2-line">
                        <p><strong>FIRMA</strong></p>
                        <a href="#">O nas</a>
                        <a href="#">Warunki użytkowania</a>
                        <a href="#">Polityka prywatności</a>
                        <a href="#">Pliki cookies</a>
                        <a href="#">Regulamin</a>
                        <a href="#">Kariera</a>
                    </div>
                    <div class="box2-line">
                        <p><strong>POMOC</strong></p>
                        <a href="#">Wyślij zgłoszenie</a>
                        <a href="#">Pomoc techniczna</a>
                        <a href="#">FAQ</a>
                    </div>
                    <div class="box2-line">
                        <p><strong>SOCIAL MEDIA</strong></p>
                        <a href="#">X (Twitter)</a>
                        <a href="#">Facebook</a>
                        <a href="#">Instagram</a>
                        <a href="#">Reddit</a>
                        <a href="#">Telegram</a>
                        <a href="#">Discord</a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="scripts.js"></script>
    </body>
</html>