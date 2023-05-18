<div id="Modal">
    <div class="modal-card">
        <?php
        if ($grocery->is_valid) {
            $successful_table = $grocery->Generate_Modal();
            $successful_html = <<<ECHO
            <h2>SUMMARY</h2>
            <table>$successful_table</table>
            <button id="modal_ensure">Finish Shopping</button>
            ECHO;
            echo $successful_html;
        } else {
            $fail_html = <<<ECHO
            <h2>Something Wrong!</h2>
            <p>Please check the form and modify the errors</p>
            <button id="modal_ensure">Let's Do It</button>
            ECHO;
            echo $fail_html;
        }
        ?>

    </div>
</div>
<script src="../js/modal.js"></script>