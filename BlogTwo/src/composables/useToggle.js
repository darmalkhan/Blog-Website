import { ref } from "@vue/reactivity";
export function useToggle(){

    let isVisable = ref(false);

    function show(){
        isVisable.value = true;
    }

    function hide(){
        isVisable.value = false;
    }

    function toggle(){
        isVisable.value === true ? hide() : show()
    }

    return{
        isVisable,
        show,
        hide,
        toggle,
    }
}