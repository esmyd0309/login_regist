<template>
    <div>
        <br>
        <b-button  class="btn btn-primary login100-form-btn" @click="showgestion=true" v-b-modal.modal-xl-2 variant="primary"> Registrar</b-button>

        <b-modal 
            id="modal-xl-2" 
            size="xl" 
            title="Registrarse" 
            v-model="showgestion"
            :header-bg-variant="headerBgVariant"
            :header-text-variant="headerTextVariant"
            :body-bg-variant="bodyBgVariant"
            :body-text-variant="bodyTextVariant"
            :footer-bg-variant="footerBgVariant"
            :footer-text-variant="footerTextVariant"            
        >
        
            <form  v-on:submit.prevent="checkForm">
                <p v-if="errors.length">
                        <ul>
                            <li v-for="(error, index) in errors" :key="index">
                                {{ error }}
                            </li>
                        </ul>
                    </p>
               
               
                <b-row>
                    <b-col md="12">
                        
                        <b-input-group prepend="Apellidos" class="mb-2 mr-sm-2 mb-sm-0">
                            <b-input 
                                
                                :state="comprobar.apellidos"
                                v-model="form.apellidos" 
                                placeholder="Apellidos"
                                required
                            >
                            </b-input>
                        </b-input-group>
                         <small v-if="!comprobar.apellidos">Es Obligatorio y un minimo de 10 Caracteres</small>
                    </b-col>
                </b-row>
                <br>
                <b-row>
                    <b-col md="12">
                        
                        <b-input-group prepend="Nombres" class="mb-2 mr-sm-2 mb-sm-0">
                            <b-input 
                                
                                :state="comprobar.nombres"
                                v-model="form.nombres" 
                                placeholder="Nombres"
                                required
                            >
                            </b-input>
                        </b-input-group>
                            <small v-if="!comprobar.nombres">Es Obligatorio y un minimo de 10 Caracteres</small>
                    </b-col>
                </b-row>
                <br>
                <b-row>
                    <b-col md="12">
                        
                        <b-input-group prepend="Usuario" class="mb-2 mr-sm-2 mb-sm-0">
                            <b-input 
                                @input="getusuario"
                                v-on:keyup.enter="getusuario"
                                @keypress.13.prevent
                                :state="comprobar.usuario"
                                v-model="form.usuario" 
                                placeholder="Usuario"
                                required
                            >
                            </b-input>
                        </b-input-group>
                        <small v-if="usuariosActuales"> <code>EL Usuario Ya Esta en Uso</code> </small>
                    </b-col>
                </b-row >
                <br>
                 <b-row v-if="!usuariosActuales">
                    <b-col md="12">
                        
                        <b-input-group prepend="Email" class="mb-2 mr-sm-2 mb-sm-0">
                            <b-input 
                                
                                :state="comprobar.email"
                                v-model="form.email" 
                                placeholder="Email"
                                required
                            >
                            </b-input>
                        </b-input-group>
                    </b-col>
                </b-row>
                <br>
                <b-row v-if="!usuariosActuales">
                    <b-col md="12">
                        <label class="sr-only" for="inline-form-input-username">Contraseña</label>
                        <b-input-group prepend="Contraseña" class="mb-2 mr-sm-2 mb-sm-0">
                            <b-input 
                                id="password"
                                :type="type"
                                :state="comprobar.contrasena"
                                v-model="form.contrasena" 
                                placeholder="Contraseña"
                                required
                            >
                            </b-input>
                            <button type="button"  @click="mostrarContrasena"><span class="fa fa-eye-slash icon"></span> </button>
                        </b-input-group>
                        

                    </b-col>
                </b-row>
                <br>
                <b-row v-if="!usuariosActuales">
                    <b-col md="12">
                        
                        <b-input-group prepend="Conf. Contraseña" class="mb-2 mr-sm-2 mb-sm-0">
                            <b-input 
                                id="password"
                                :type="type"
                                :state="comprobar.contrasenaconf"
                                v-model="form.contrasenaconf" 
                                required
                            >
                            </b-input>
                        </b-input-group>
                        

                    </b-col>
                </b-row>
                <br>
                <b-row>
                    <b-col md="2">
                    </b-col>

                    <b-col md="4" v-if="!usuariosActuales">
                        <b-button type="submit"  class="mt-3" variant="outline-success" block >Registrarme</b-button>
                    </b-col>

                    <b-col md="4">
                        

                         <b-button class="mt-3" variant="outline-danger" block @click="showgestion=false">Cerrar</b-button>
                    </b-col>
                    <b-col md="2">
                    </b-col>
                </b-row>

            </form>
            
            <template v-slot:modal-footer>
                <div class="w-100">
                <p class="float-left">Debe llenar todo los campos requeridos</p>
                </div>
            </template>
        </b-modal>
        
    </div>
</template>

<script>
import axios from 'axios'
import Vue from "vue";
import 'whatwg-fetch';

import swal from 'sweetalert2'


const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#ff7674',
};


export default {
    name: 'registrar',


     data() {
        return {

            form: {
                nombres: '',
                apellidos: '',
                email: '',
                usuario: '',
                contrasena: '',
                contrasenaconf: '',
                
                
            },
           usuariosActuales: null,
            type: 'password',
            usuariocreado: [],
            errors: [],
            crear: true,
            gestiones: [],
            showgestion: false,
            variants: ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'light', 'dark'],
            headerBgVariant: 'dark',
            headerTextVariant: 'light',
            bodyBgVariant: 'light',
            bodyTextVariant: 'dark',
            footerBgVariant: 'warning',
            footerTextVariant: 'dark',
            enlace: 'http://159.203.177.236/',
            enter: false

        }
    },
    computed: {


        comprobar()
        {
            return  { 
                
           
                nombres: this.form.nombres.length > 10 ? true : false,
                usuario: this.form.usuario.length > 4  ? true : false,
                apellidos: this.form.apellidos.length > 10 ? true : false,
                email: this.form.email.length > 7 ? true : false,
                contrasena: this.form.contrasena.length >= 5 ? true : false,
                contrasenaconf: this.form.contrasenaconf!='' && this.form.contrasenaconf == this.form.contrasena && this.form.contrasenaconf.length >= 5 ? true : false,

                
                
            }
        }
            
    },
   
 
    methods:{
        
           getusuario()
            {
               
                    axios.get(this.enlace+'usuariosActuales/'+this.form.usuario)
                            .then(res => {
                            this.usuariosActuales = res.data.usuario;
                    });
                
           
            },
    
            agregar(){
                const parametros  = {
                                        nombres:            this.form.nombres,
                                        apellidos:          this.form.apellidos,
                                        email:              this.form.email,
                                        contrasena:         this.form.contrasena,                                      
                                        usuario:            this.form.usuario
                                       
                                        
                                    }
           
                this.form.nombres  = '';
                this.form.apellidos  = '';
                this.form.email  = '';
                this.form.contrasena  = '';                                      
                this.form.usuario  = '';
                this.type= 'password';


                axios.post(this.enlace+'usersdd',parametros)
                .then(res => {
                    this.usuariocreado.push(res.data)
                    swal(
                            'Usuario Registrado con Exito,',
                            res.data.success,
                            'success'
                        )
                })
                .catch(err => {
                            console.log(err.response.data)
                            swal(
                                'Error',
                                err.response.data,
                                'error'
                            )
                        });

                this.showgestion=false
                
            },
            checkForm: function(){
                this.errors = [];
                
                if(!this.form.nombres){
                    this.errors.push('El nombres es Obligatorio');
                }
                if(!this.form.apellidos){
                    this.errors.push('El apellido es Obligatorio');
                }
                
                

                
                
                if(this.form.nombres && this.form.apellidos ){
                    this.agregar();
                }
                
            },
            mostrarContrasena(){
                const tipo = document.getElementById("password");
               
                if(tipo.type == "password"){
                    this.type = "text";
                    tipo.type = "text";
                }else{
                    this.type = "password";
                    tipo.type = "password";
                }
            },
            
     }
}
</script>