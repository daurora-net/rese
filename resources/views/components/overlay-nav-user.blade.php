<div class="overlay">
    <nav class="overlay_nav">
        <ul class="overlay_ul">
            <li class="overlay_li"><a href="/" class="overlay_link">Home</a></li>
            <li class="overlay_li">
                <form method="post" action="/logout">
                    @csrf
                    <input class="overlay_link" type="submit" value="Logout">
                </form>
            </li>
            <li class="overlay_li"><a href="/mypage" class="overlay_link">Mypage</a></li>
        </ul>
    </nav>
</div>
