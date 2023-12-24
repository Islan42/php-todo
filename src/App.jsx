import React from 'react';

export default function App( { todos } ) {
	const tasksArray = JSON.parse(todos);
	const filterBy = 'All';
	
	let listToShow = (<p>Nada para nada.</p>);
	
	if (tasksArray.length){
		listToShow = tasksArray.map((task) => {
			return (
				<Task key={task.id} task={task}/>
			);
		});		
	}
	
	return (
		<>
			<input type="text" placeholder="Preciso fazer..." />
			<button>Adicionar</button>
			
			<ul>
				{listToShow}
			</ul>
		</>
	);
}

function Task({ task }){
	return(
		<li>
			<span>{`${task.id} -- ${task.task}`}</span>
			<input type="checkbox" />
		</li>
	);
}
