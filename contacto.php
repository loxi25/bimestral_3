<form action="guardar_solicitud.php" method="POST" class="space-y-4">

    <div>
        <label for="nombre"
               class="block font-semibold text-slate-700 mb-1">
            Nombre
        </label>

        <input type="text"
               id="nombre"
               name="nombre"
               required
               class="w-full border border-slate-300 rounded-lg p-3">
    </div>

    <div>
        <label for="correo"
               class="block font-semibold text-slate-700 mb-1">
            Correo electrónico
        </label>

        <input type="email"
               id="correo"
               name="correo"
               required
               class="w-full border border-slate-300 rounded-lg p-3">
    </div>

    <div>
        <label for="mensaje"
               class="block font-semibold text-slate-700 mb-1">
            Solicitud
        </label>

        <textarea id="mensaje"
                  name="mensaje"
                  rows="5"
                  required
                  class="w-full border border-slate-300 rounded-lg p-3"></textarea>
    </div>

    <div>
        <label for="id_producto"
               class="block font-semibold text-slate-700 mb-1">
            ID del producto
        </label>

        <input type="number"
               id="id_producto"
               name="id_producto"
               required
               class="w-full border border-slate-300 rounded-lg p-3">
    </div>

    <div>
        <label for="id_categoria"
               class="block font-semibold text-slate-700 mb-1">
            ID de categoría
        </label>

        <input type="number"
               id="id_categoria"
               name="id_categoria"
               required
               class="w-full border border-slate-300 rounded-lg p-3">
    </div>

    <button type="submit"
            class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg hover:bg-indigo-700">
        Enviar solicitud
    </button>

</form>