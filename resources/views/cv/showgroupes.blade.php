@extends('layouts.app')

@section('content')



<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">

<h1>@{{message}}</h1>

       
        
        <hr>
 <div class="panel panel-primary">
            <div class="panel-heading">
            <div class="row">
                <div class="col-md-10">  <h3 class="panel-title">Groupe</h3></div>
                <div class="col-md-2 text-right">    
        <button class="btn btn-success" @click= "open= true" >Ajouter</button>
                </div>
            </div>
            </div>
            <div class="panel-body"> 



                <div v-if="open">
                    <div class="form-group">
                    <label for=""> Titre</label> 
                    <input type="text" placeholder="Le titre" class="form-control" v-model=experience.titre name="titre" v-validate="'required|min:5|max:255'">
                 
  <span v-show="errors.has('titre')">@{{ errors.first('titre') }}</span>      
                   </div>

                    <div class="form-group">
                    <label for=""> Description </label> 
                  <textarea class="form-control" rows="3" placeholder="Le contenu" v-model=experience.body></textarea>
                   </div>


                   <div class="row">
                       

        <button  v-if="edit "class="btn btn-danger btn-block" @click="updateExperience">   Modifier</button>

 <button v-else class="btn btn-info btn-block" @click="addExperience">   Ajouter</button>


                   </div>


                </div>
            <ul class="list-group">
                <li class="list-group-item" v-for="experience in experiences">               
                <div class="pull-right">
                <button class="btn btn-warning btn-sm" @click="editExperience(experience)">Editer</button>
    <button class="btn btn-danger btn-sm" @click="deleteExperience(experience)">Supprimer</button>

                
                </div>
                <h3>  @{{experience.titre}} </h3>
                <p> @{{experience.body}}  </p>
                <small>@{{experience.debut}}-@{{experience.fin}}</small>
                </li>
               <!-- <li class="list-group-item">
                <div class="pull-right">
                <button class="btn btn-warning btn-sm">Editer</button>
                
                </div>
                <h3>  Lorem ipsum dolor sit amet consectetur.</h3>
                <p>   Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic reiciendis recusandae veniam ipsam debitis facilis eum velit corporis excepturi minus quidem quam dicta at harum ratione, id soluta eius exercitationem sequi non nemo corrupti nam! Cum rerum adipisci possimus! Aperiam, et quae qui dolorem quasi delectus. Deserunt voluptatum nam dolore!            </p>
                <small>16/01/2018-16/01/2019</small>
                </li>
                <li class="list-group-item">
                <div class="pull-right">
                <button class="btn btn-warning btn-sm">Editer</button>
                
                </div>
                <h3>  Lorem ipsum dolor sit amet consectetur.</h3>
                <p>   Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic reiciendis recusandae veniam ipsam debitis facilis eum velit corporis excepturi minus quidem quam dicta at harum ratione, id soluta eius exercitationem sequi non nemo corrupti nam! Cum rerum adipisci possimus! Aperiam, et quae qui dolorem quasi delectus. Deserunt voluptatum nam dolore!            </p>
                <small>16/01/2018-16/01/2019</small>
                </li>
            </ul>
            </div>
        </div>
        

        -->



@endsection


@section('javascripts')


 <script src="{{ asset('js/vue.js') }}"></script>
  <script src="{{ asset('js/validate.js') }}"></script>



 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.25.6/dist/sweetalert2.all.min.js"></script>

    <!-- jsdelivr cdn -->
  <script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>

  <!-- unpkg -->
  <script src="https://unpkg.com/vee-validate@latest"></script>


<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser 


  <!-- Scripts -->
    <script>
        Vue.use(VeeValidate);
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'idExperience'=>$id,
            'url'=>url('/')
        ]) !!};
    </script>






<script >
    




    var app= new Vue({

        el:'#app',
        data:{


            message:'Hello World ',
            experiences:[],
            open:false,
            experience: {

                id:0,
                cv_id: window.Laravel.idExperience,
                titre:'',
                body:'',
                debut:'',
                fin:''



            },
            edit:false
        },
        methods:{


            getExperiences: function() 
            {

                axios.get(window.Laravel.url+'/getexperiences/'+window.Laravel.idExperience)
                .then(response => {
                    this.experiences=response.data;
                    
                })
                .catch(error=> {
                    console.log('errors:',error);
                })
            },
            addExperience:function () {

                axios.post(window.Laravel.url+'/addexperience',this.experience)
                .then(response=>{
                    if(response.data.etat)
                    {
                        this.open=false;
                        this.experience.id=response.data.id;
                        this.experiences.unshift(this.experience);
                        this.experience ={  


                id:0,
                cv_id: window.Laravel.idExperience,
                titre:'',
                body:'',
                debut:'',
                fin:''



                        }
                    }
                    console.log(response.data)
                  



                })
                .catch(error=>{
                     console.log(error)

                })
            },

            editExperience : function(experience)
            {
                     this.open=true;
                     this.edit=true;
                     this.experience=experience;



            },

            updateExperience : function()
            {  

                axios.put(window.Laravel.url+'/updateexperience',this.experience)
                .then(response=>{
                    if(response.data.etat)
                    {
                        this.open=false;
                    
                        this.experience ={  


                id:0,
                cv_id: window.Laravel.idExperience,
                titre:'',
                body:'',
                debut:'',
                fin:''



                        };
                    }
                  
this.edit=false;


                })
                .catch(error=>{
                     console.log(error)

                })



            },
            deleteExperience :  function (experience)



            {        




                swal({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then(() => {
    
                        axios.delete(window.Laravel.url+'/deleteexperience/'+experience.id)
                .then(response=>{
                    if(response.data.etat)
                    {
                       var position=this.experiences.indexOf(experience);
                       this.experiences.splice(position,1);
                    }
                  


                })
                .catch(error=>{
                     console.log(error)

                })
    swal(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  
})


                       
                

            }
        },
        mounted: function()
        {


            this.getExperiences();
        }






    });
</script>







@endsection