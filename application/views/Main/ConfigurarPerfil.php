<div class="page-header">
    <div class="page-title">
        <h3>Configurar Perfil</h3>
    </div>
</div>

<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget-four">
            <div class="widget-content">
                <div id="datos-personales-wizard" class="">
                    <h3>Datos personales</h3>
                    <section class="">
                        <div class="row col-sm-12 col-md-12 col-lg-10 mx-auto">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <label for="nombreInput">Nombres</label>
                                <input type="text" id="nombreInput" class="form-control" placeholder="Nombres" required>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <label for="apellidoInput">Apellidos</label>
                                <input type="text" id="apellidoInput" class="form-control" placeholder="Apellidos" required>
                            </div>
                        </div>
                        <div class="row col-sm-12 col-md-12 col-lg-10 mx-auto">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <label for="duiInput">Documento de identidad</label>
                                <input type="text" id="duiInput" class="form-control" placeholder="Documento de identidad" required>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <label for="numTelInput">Numero telefonico</label>
                                <input type="text" id="numTelInput" class="form-control" placeholder="Numero telefonico" required>
                            </div>
                        </div>
                    </section>
                    <h3>Dirección actual</h3>
                    <section>
                        <div class="row col-sm-12 col-md-12 col-lg-10 mx-auto">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <label for="selectDepartamento">Departamento</label>
                                <select name="selectDepartamento" class="form-control" id="selectDepartamento" required>
                                    <option value="">Selecciona tu departamento</option>
                                    <?php foreach ($data['departamentos']->result() as $departamento) {
                                        echo '<option value="' . $departamento->id . '">' . $departamento->nombre_departamento . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <label for="selectMunicipio">Numero telefonico</label>
                                <select name="selectMunicipio" id="selectMunicipio" class="form-control"></select>
                            </div>
                        </div>
                    </section>
                    <h3>Detalles</h3>
                    <section>
                        <p>The next and previous buttons help you to navigate through your content.</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("includes/footer");?>
<script src="<?php echo base_url() ?>assets/plugins/jquery-step/jquery.steps.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/custom_js/config_perfil.js"></script>