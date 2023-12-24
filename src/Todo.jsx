import React from 'react';
import { useState } from 'react';

export default function Todo( { todos } ) {	
	const [tasksArray, setTasksArray] = useState(JSON.parse(todos));
	const [filterBy, setFilterBy] = useState('Finished');
	
	const filteredTasks = tasksArray.filter((task) => filterTask(filterBy, task))
	
	function onTaskChange(id){
		const newArray = tasksArray.map((task) => {
			if (task.id === id){
				task.finished = !task.finished;
			}
			
			return task;
		});
		
		setTasksArray(newArray);
	}
	function onInputButtonClick(){
		
	}
	function onFilterByChange(){
		
	}
	
	
	return (
		<>
			<InputTask />
			<TaskTable tasks={filteredTasks} onTaskChange={onTaskChange} />
		</>
	);
}

function InputTask(){
	return(
		<>
			<input type="text" placeholder="Preciso fazer..." />
			<button>Adicionar</button>
		</>
	);
}

function TaskTable({ tasks, onTaskChange }){	
	if (tasks.length){
		const output = tasks.map((task) => {
			return (
				<Task key={task.id} task={task} onTaskChange={onTaskChange} />
			);
		});
		
		return (
			<ul>
				{output}
			</ul>
		);
	} else {
		const output = (<p className="text-gray-500 text-center mt-4">Nada para nada</p>);
		
		return (
			<>
				{output}
			</>
		);
	}
}

function Task({ task, onTaskChange }){
	function onCheckboxChange(){
		onTaskChange(task.id);
	}
	
	return(
		<li>
			<span>{`${task.id} -- ${task.task}`}</span>
			<input type="checkbox" checked={task.finished} onChange={onCheckboxChange} />
		</li>
	);
}

function filterTask(filter, task){
	switch (filter){
		case 'All':
			return true;
			break; //Apenas por clareza
		case 'Finished':
			return task.finished;
			break;
		case 'Unfinished':
			return ! task.finished;
			break;
	}
}