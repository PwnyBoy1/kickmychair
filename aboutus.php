<?php
    include_once 'header.php';
?>
<div class="aboutUs-container">
    <div class="aboutUs-banner">
        <img src="./KickMyC/thumbnail.png" alt="Banner for KickMyChair.com">
    </div>
    <div class="aboutUs-text">
    <h1>About KickMyChair.com</h1>
    <p>Hello, eager gamers from around the globe! Welcome to my humble website, 
        a collaboration with my friend Dominick (art director). The website's 
        main goal is to showcase my web developing skills as they grow and, equally 
        importantly, to bring Dom's dream to life.</p>

    <h2>Latest Patches</h2>
    <?php
    $owner = 'PwnyBoy1';
    $repo = 'KickMyChair';

    $commits = getGitHubCommits($owner, $repo);

    if ($commits) {
        foreach ($commits as $commit) {
            echo "<h3>Commit by {$commit['commit']['author']['name']}:</h3>";
            echo "<p>{$commit['commit']['message']}</p>";
        }
    } else {
        echo "Failed to fetch GitHub commits.\n";
    }

    function getGitHubCommits($owner, $repo) {
        $url = "https://api.github.com/repos/{$owner}/{$repo}/commits";
        
        $options = [
            'http' => [
                'header' => "User-Agent: kickmychair",
            ],
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response !== false) {
            return json_decode($response, true);
        } else {
            return null;
        }
    }
    ?>
    </div>
</div>