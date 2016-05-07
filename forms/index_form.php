<div>

    <div class='cabecera'>
        <h2>Acceso Usuarios</h2>
    </div>

    <form id="index-form" method="post">

        <div class="row">
            <div class="two columns"><label for="usuario">Usuario:</label></div>
            <div class="six columns">
                <input id="usuario" name="<?php print FIELD_USER; ?>" type="text"
                       class="u-full-width" value="<?php showValueInSession(FIELD_USER); ?>">
            </div>
            <?php showValidationError(FIELD_USER); ?>
        </div>

        <div class="row">
            <div class="two columns"><label for="password">Password:</label></div>
            <div class="six columns">
                <input id="password" name="<?php print FIELD_PASSWORD; ?>" type="password"
                       class="u-full-width" value="<?php showValueInSession(FIELD_PASSWORD); ?>">
            </div>
            <?php showValidationError(FIELD_PASSWORD); ?>
        </div>

        <!--    -->
        <!--    <p><label for="user">Usuario: </label>-->
        <!--        <input id="user" name="--><?php //print FIELD_USER; ?><!--"></p>-->
        <!--    <p><label for="password">Contraseña: </label> -->
        <!--        <input id="password" type="password" name="--><?php //print FIELD_PASSWORD; ?><!--"></p>-->

        <input type="submit" value="Login" name="ok" class="button-primary">
    </form>
</div>