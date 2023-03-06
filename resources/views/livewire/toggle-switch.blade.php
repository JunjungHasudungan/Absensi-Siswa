<div class="form-check form-switch inline-block">
    <div class="relative  inline-block w-10 mr-2 items-center align-middle select-one transition duration-200 ease-in">
        <input wire:model="isCheck" name="toggle" id="toggle" class="focus:outline-none toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 apperance-none cursor-pointer" type="checkbox" >
        <label for="toggle" class="toggle-label inline-block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
    </div>
        <div
        class="font-italic"
        x-data="{show:false}"
        x-show="show"
        x-init="@this.on('saved', () => { show = true; setTimeout(()=> { show = false; }, 2000 ) })"
        > Sudah periksa
    </div>

</div>
<style>
    .toggle-checkbox:checked{
        @apply:right-0 border-green-400;
        right:0;
        border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label{
        @apply:bg-green-400;
        background-color:#68D391;
    }
</style>
