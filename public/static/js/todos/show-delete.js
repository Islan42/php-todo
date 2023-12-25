const btnDelete = document.getElementById('btn-delete-todo');
const avisoRoot = document.getElementById('aviso-root');

btnDelete.addEventListener('click', () => {
	resetDIV();
	
	const newDiv = document.createElement('div');
	newDiv.innerHTML = 
	`
		<div>
			<h2 class="text-xl text-red-700 text-center font-semibold">Cuidado</h2>
			<p class="text-gray-600 text-sm">Deseja realmente deletar este A Fazer?</p>
		</div>
		
		<div class="mt-4 flex justify-between">
			<button id="btn-voltar" class="btn bg-red-400 hover:bg-red-500">Não</button>
			<button type="submit" form="form-delete-todo" class="btn bg-red-400 hover:bg-red-500">Sim</button>
		</div>
	`;
	newDiv.className = 'max-w-64 max-h-32 p-2 bg-red-100 rounded-lg absolute inset-0 mx-auto my-auto';
	
	avisoRoot.appendChild(newDiv);
	
	const btnVoltar = document.getElementById('btn-voltar');
	btnVoltar.addEventListener('click', resetDIV);
});

function resetDIV(){
	while(avisoRoot.firstChild){
		avisoRoot.removeChild(avisoRoot.firstChild)
	}
}