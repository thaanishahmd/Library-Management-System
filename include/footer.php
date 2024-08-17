<div class="menu flex2">
            <?php
            if(isset($_SESSION['admin_id'])){
            ?>
                <a href="managemembers.php">Manage Members</a>
                <a href="managepublisher.php">Manage Publishers</a>
                <a href="managebooks.php">Add Books</a>
                <a href="bookstatus.php">Book Status</a>

            <?php
                }
                else{
            ?> 
                <a href="aboutus.php">About Us</a>
                <a href="news.php">News</a>
            <?php
            }
            ?>
        </div>
    </div>

    <footer>

        <div class="footer-links">

            <div class="menu">

                <div class="calendar">
                    <div class="month">
                        <strong>June</strong>
                        <br>
                        <strong>2021</strong>
                    </div>
                    <table>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Sun</th>
                            <th>Sun</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td>19</td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>21</td>
                            <td>22</td>
                            <td>23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td>28</td>
                            <td>29</td>
                            <td>30</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>

            </div>

            <div class="menu">
                <h4><u>Vision</u></h4><br>
                <p class="vision">This web portal published in the mid 2021. This library is engaged in learning and discovery as essential participants in the educational community. We develop, organize, provide access to and preserve materials to meet the needs of present and future generations of students and scholars. We explore and implement innovative technologies and services to deliver information and scholarly resources conveniently to users anytime/anyplace. We also provide well-equipped and functional physical spaces where students can pursue independent learning and discovery outside the classroom. We also support scholarship and research productivity and foster their vitality.</p>
                <?php
                if(isset($_SESSION['user_id'])){
                ?><form action="feedbackform.php">
                    <button class="fbbutton">Provide a Feedback</button>
                    </form>
                <?php
                }
                ?>
            </div>
            <div class="menufollow">
                <br>
                <strong>Follow Us on:</strong>
                <br><br>
                <a href="https://www.facebook.com/" class="fa fa-facebook"></a><br>
                <a href="https://www.twitter.com/" class="fa fa-twitter"></a>
            </div>

        </div>

        <p class="copyright">&copy Copyright 2021 | <a href="">Spectrum Library</a></p>

    </footer>

<script src="./js/homescript.js"></script>
<script>
    document.getElementById("close-btn").addEventListener("click", alerTrigger);
    function alerTrigger() {
        var alert = document.getElementById('alert');
        alert.classList.remove("show");
        alert.classList.add("hide");
    }
</script>
</body>

</html>