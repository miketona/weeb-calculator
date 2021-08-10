<?php
function getFooter()
{
?>
    </main>
    <footer class="m2 z-depth-5 page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Like the site?</h5>
                    <p class="grey-text text-lighten-4">All the code for this site, as well as other cool projects can be found at my <a target = "_blank"class="grey-text text-lighten-3" href="https://github.com/miketona/weeb-calculator">GitHub.</a></p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Shoutouts</h5>
                    <ul>
                        <li><a target = "_blank" class="grey-text text-lighten-3" href="https://materializecss.com/">Materialize CSS Style library</a></li>
                        <li><a  target = "_blank" class="grey-text text-lighten-3" href="https://jikan.docs.apiary.io/">MyAnimeList Unofficial API</a></li>
                        <li><a target = "_blank"  class="grey-text text-lighten-3" href="https://wallpaperaccess.com/anime">Image Source</a></li>
                        <li><a target = "_blank"  class="grey-text text-lighten-3" href="https://animechan.vercel.app/">Anime Quote Generator API</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <br>
        <div class="footer-copyright">
            <div class="container">
            <p class = "white-text randomAnimeQuote"></p>
            </div>
        </div>
    </footer>
    <script src='../js/main.js'>

    </script>
    </body>
<?php
}
