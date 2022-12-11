import { registerRuntimeHelpers } from "@vue/compiler-core";
import { createWebHistory, createRouter} from "vue-router";
import login from "./components/auth/Login.vue";
import Register from  "./components/auth/Register.vue";
import Account from "./components/Account.vue";
import Home from "./components/home/Home.vue";
import Forgot from "./components/auth/Forgot-password.vue";
import Resetpassword from "./components/auth/Resetpassword.vue";
import NavBar from "./components/NavBar.vue";
import NavBar2 from "./components/NavBar2.vue";
import admin from "./components/roles/Admin/admin.vue";
import Ventas from "./components/roles/Admin/ventas.vue";
import Products from "./components/roles/Admin/Products.vue";
import client from "./components/roles/Client/client.vue";
import usadmin from "./components/roles/Admin/usadmin.vue";
import employee from "./components/employee.vue";
import vemployee from "./components/roles/Employee/vemployee.vue";
import redes from "./components/redes.vue";
import pclient from "./components/roles/Client/pclient.vue";
import images from "./components/roles/Admin/images.vue";
import clientbuys from "./components/roles/Client/clientbuys.vue";
import Eimages from "./components/roles/Employee/Eimages.vue";
import Eproducts from "./components/roles/Employee/Eproducts.vue";


const routes= [
{
        path:"/",
        name:"Home",
        components:{
        NavBar: NavBar,
        redes:redes,
        default: Home,}
    },
{
    path:"/Login",
    name:"Login",
    components:{
        NavBar: NavBar,
        redes:redes,
            default: login,}
},
{
    path:"/register",
    name:"Register",
    components:{
        NavBar: NavBar,
        redes:redes,
            default: Register,}
},
{
    path:"/account",
    name:"Account",
    component:Account,
    // children:[
        // {
        //     path: "/admin",
        //     name: "admin",
        //     components:{
        //         NavBar: NavBar2,
        //             default: admin,},
        //     children:[
        //         {
        //             path:"/Ventas",
        //             name: "Ventas",
        //             component: Ventas,
        //         },
        //         {
        //             path:"/Products",
        //             name: "Products",
        //             component: Products,
        //         },
        //         {
        //             path:"/usadmin",
        //             name:"usadmin",
        //             component:usadmin,
                    
        //         },
        //             {
        //                 path:"/images",
        //                 name:"images",
        //                 component:images
        //             },
        //     ]
            
        // },
        // {
        //     path:"/client",
        //     name:"client", 
        //     components:{
        //         NavBar: NavBar2,
        //         redes:redes,
        //         default: client,},
        //     children:[
        //     {
        //         path:"/homeclient",
        //         name: "homeclient",
        //         component:homeclient,
        //     },
                      
        // ]
        // },
        // {
        //     path:"/employee",
        //     name:"employee",
        //     components:{
        //         NavBar: NavBar2,
        //         default: employee,}, 
        // },

    // ]
},
{
    path: "/admin",
    name: "admin",
    components:{
        NavBar: NavBar2,
            default: admin,},
    children:[
        {
            path:"/Ventas",
            name: "Ventas",
            component: Ventas,
        },
        {
            path:"/Products",
            name: "Products",
            component: Products,
        },
        {
            path:"/usadmin",
            name:"usadmin",
            component:usadmin,
            
        },
        {
            path:"/images",
            name:"images",
            component:images
        },
       
    ]
    
},
{
    path:"/client",
    name:"client", 
    components:{
        NavBar: NavBar2,
        redes:redes,
        default: client,},
    children:[
    {
        path:"/pclient",
        name: "pclient",
        component:pclient,
    },
    {
        path:"/clientbuys",
        name: "clientbuys",
        component:clientbuys,
    },
              
]
},
{
    path:"/Employee",
    name:"Employee",
    components:{
        NavBar: NavBar2,
        default: employee,
    }, 
    children:[
            {
                path:"/vemployee",
                name: "vemployee",
                component:vemployee,
            },
            {
                path:"/Eimages",
                name: "Eimages",
                component:Eimages,
            }, 
            {
                path:"/Eproducts",
                name: "Eproducts",
                component:Eproducts,
            },            
        ]
},
{
    path:"/Forgot-password",
    name:"Forgot-password",
    component:Forgot,
},
{
    path:"/Resetpassword",
    name:"Resetpassword",
    component:Resetpassword,
},





];

const router=  createRouter(
    {
       history: createWebHistory(),
       routes,
    }
);

export default router;
