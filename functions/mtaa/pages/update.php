<div class="wrap">
    <div class="icon32" id="icon-tools"><br></div>
    <h2>Mtaa Framework Update</h2>

        <?php
        $isUpdated = false;

        $remoteVersion = Mtaa_Framework_Updater::get_remote_version();
        $localVersion = Mtaa_Framework_Updater::get_local_version();

        if (preg_match('/[0-9]*\.?[0-9]+/', $remoteVersion)) {

            if (version_compare($localVersion, $remoteVersion) < 0) {
                $isUpdated = true;
            }

        } else {
            echo '<p>' . $remoteVersion . '</p>';
        }
        ?>

        <?php if ($isUpdated) : ?>

            <div style="border: 1px solid #E6DB55;background-color: #FFFBCC;color: #424242;padding: 10px;margin-top: 20px;border-radius:4px;">
                A new Mtaa Framework update is available.
                <p><strong>Important:</strong> Backup your theme and modified files before updating. For help visit <a href="http://www.mtaandao.co.ke/docs/using-the-mtaa-framework-automatic-updates/">Using the Mtaa Framework automatic updates</a>.</p>

                <form method="post" id="mtaa-update">
                    <input type="hidden" name="mtaa-update-do" value="update" />
                    We recommend you to &nbsp;<input type="submit" class="button button-primary" value="Update Automatically" />
                    &nbsp; or you can &nbsp;<a href="http://framework.mtaandao.co.ke/mtaa-framework.zip" class="button">Download Update</a>&nbsp; and install it manually in the <code>functions/mtaa/</code> folder.
                </form>
            </div>

            <?php if (method_exists('Mtaa_Framework_Updater', 'get_changelog')) : ?>
            <h3>Changelog</h3>
            <div style="height: 400px; overflow: scroll; border: 1px solid #ccc; border-radius:3px; padding: 0 10px; background: #F8F8F8; font-size: 12px;">
                <?php
                $start = false;
                $changelog = Mtaa_Framework_Updater::get_changelog();
                $changelog = explode("\n", $changelog);
                foreach ($changelog as $line) {
                    if (preg_match("/v ((?:\d+(?!\.\*)\.)+)(\d+)?(\.\*)?/i", $line)) {
                        $start = true;
                        echo '<h4>' . $line . '</h4>';
                    } elseif($start && trim($line)) {
                        echo '<pre>' . $line . '</pre>';
                    }
                }
                ?>
            </div>
            <?php endif; ?>
        <?php else : ?>
            <p>&rarr; <strong>You are using latest framework version:</strong> <?php echo $localVersion; ?></p>
            <?php option::delete('framework_status'); ?>
        <?php endif; ?>
</div><!-- end .wrap -->
