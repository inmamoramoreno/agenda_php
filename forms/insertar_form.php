<div>
    <h4>Insertar nueva persona</h4>

    <form id="insertar-form" method="post" action="" novalidate>

        <div class="row">
            <div class="two columns"><label for="empresa">Empresa:</label></div>
            <div class="six columns">
                <input id="empresa" name="<?php print FIELD_EMPRESA; ?>" type="text"
                       class="u-full-width" value="<?php showValueInSession(FIELD_EMPRESA); ?>">
            </div>
            <?php showValidationError(FIELD_EMPRESA); ?>
        </div>

        <div class="row">
            <div class="two columns"><label for="direccion">Dirección:</label></div>
            <div class="six columns">
                <textarea class="u-full-width" id="direccion"
                          name="<?php print FIELD_DIRECCION; ?>"><?php showValueInSession(FIELD_DIRECCION); ?></textarea>
            </div>
            <?php showValidationError(FIELD_DIRECCION); ?>
        </div>

        <div class="row">
            <div class="two columns"><label for="nombre">Nombre:</label></div>
            <div class="six columns">
                <input id="nombre" name="<?php print FIELD_NOMBRE; ?>" type="text"
                       class="u-full-width" value="<?php showValueInSession(FIELD_NOMBRE); ?>">
            </div>
            <?php showValidationError(FIELD_NOMBRE); ?>
        </div>

        <div class="row">
            <div class="two columns"><label for="telefono">Teléfono:</label></div>
            <div class="six columns">
                <input id="telefono" name="<?php print FIELD_TELEFONO; ?>" type="text"
                       class="u-full-width" value="<?php showValueInSession(FIELD_TELEFONO); ?>">
            </div>
            <?php showValidationError(FIELD_TELEFONO); ?>
        </div>

        <div class="row">
            <div class="two columns"><label for="dni">DNI:</label></div>
            <div class="six columns">
                <input id="dni" name="<?php print FIELD_DNI; ?>" type="password"
                       class="u-full-width" value="<?php showValueInSession(FIELD_DNI); ?>">
            </div>
            <?php showValidationError(FIELD_DNI); ?>
        </div>

        <div class="row">
            <div class="two columns"><label for="correo">Correo:</label></div>
            <div class="six columns">
                <input id="correo" name="<?php print FIELD_CORREO; ?>" type="email"
                       class="u-full-width" value="<?php showValueInSession(FIELD_CORREO); ?>">
            </div>
            <?php showValidationError(FIELD_CORREO); ?>
        </div>

        <div class="row">
            <div class="two columns"><label for="correo">Introduce el Sector:</label></div>
            <div class="six columns">
                <div class="row">
                    <input type="radio" name="<?php print FIELD_ESPECIALIDAD; ?>"
                           value="<?php print FIELD_ESPECIALIDAD_1_VALUE; ?>">
                    <span class="label-body"><?php print FIELD_ESPECIALIDAD_1_VALUE; ?></span>
                </div>
                <div class="row">
                    <input type="radio" name="<?php print FIELD_ESPECIALIDAD; ?>"
                           value="<?php print FIELD_ESPECIALIDAD_2_VALUE; ?>">
                    <span class="label-body"><?php print FIELD_ESPECIALIDAD_2_VALUE; ?></span>
                </div>
            </div>
        </div>

        <input type="submit" value="Insertar" name="guardar" class="button-primary">
    </form>
</div>
