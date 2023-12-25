import React from 'react';
import { useState } from 'react';

export default function Todo( { todos, saveInput } ) {	
	const [tasksArray, setTasksArray] = useState(JSON.parse(todos));
	const [filterBy, setFilterBy] = useState('All');
	
	const filteredTasks = tasksArray.filter((task) => filterTask(filterBy, task))
	
	function onTaskChange(id){
		const newArray = tasksArray.map((task) => {
			if (task.id === id){
				task.finished = !task.finished;
			}
			
			return task;
		});
		setTasksArray(newArray);
		saveInputElement(newArray);
	}
	function onDeleteTask(id){
		const newArray = tasksArray.filter((task) => {
			return task.id !== id;
			// return task.id === id ? false : true;
			// return task.id !== id ? true : false;
		});
		
		setTasksArray(newArray);
		saveInputElement(newArray);
	}
	function onNewTask(nome){
		const newID = tasksArray[tasksArray.length - 1] ? tasksArray[tasksArray.length - 1].id + 1 : 0;
		const newTask = {id: newID, task: nome, finished: false };
		const newArray = [...tasksArray, newTask];
		
		setTasksArray(newArray);
		saveInputElement(newArray);
	}
	function onFilterChange(value){
		setFilterBy(value);
	}
	
	
	return (
		<>
			<InputTask filter={filterBy} onFilterChange={onFilterChange} onITButtonClick={onNewTask} />
			<TaskTable tasks={filteredTasks} onTaskChange={onTaskChange} onDeleteTask={onDeleteTask} />
		</>
	);
	
	function saveInputElement(array){
		const arrayJSON = JSON.stringify(array);
		saveInput.textContent = arrayJSON;
	}
}

function InputTask({ filter, onFilterChange, onITButtonClick }){
	function onRadioChange(event){
		onFilterChange(event.target.value);
	}
	
	function onSubmitTask(event){
		event.preventDefault();
		
		const inputElement = document.getElementById('newTaskInput');
		inputElement.focus();
		
		if(! inputElement.value){
			return;
		}
		
		onITButtonClick(inputElement.value);
		inputElement.value = '';
	}
	
	return(
		<div className="max-w-xl mx-auto">
			<form onSubmit={onSubmitTask} className="flex space-x-2">
				<input type="text" placeholder="Preciso fazer..." id="newTaskInput" className="p-1 px-2 flex-1"/>
				<button className="rounded-sm bg-indigo-200 p-1">Adicionar</button>
			</form>
			<div className="flex space-x-2 justify-center mt-3">
				<div className="space-x-1">
					<input type="radio" name="filter" id="all" value="All" onChange={onRadioChange} checked={filter === 'All' ? true : false}/>
					<label htmlFor="all" >Todos</label>
				</div>
				<div className="space-x-1">
					<input type="radio" name="filter" id="finished" value="Finished" onChange={onRadioChange} checked={filter === 'Finished' ? true : false}/>
					<label htmlFor="finished">Finalizados</label>
				</div>
				<div className="space-x-1">
					<input type="radio" name="filter" id="unfinished" value="Unfinished" onChange={onRadioChange} checked={filter === 'Unfinished' ? true : false}/>
					<label htmlFor="unfinished">Em Aberto</label>
				</div>
			</div>
		</div>
	);
}

function TaskTable({ tasks, onTaskChange, onDeleteTask }){	
	if (tasks.length){
		const output = tasks.map((task) => {
			return (
				<Task key={task.id} task={task} onTaskChange={onTaskChange} onDeleteTask={onDeleteTask} />
			);
		});
		
		return (
			<ul className="mt-4">
				{output}
			</ul>
		);
	} else {
		const output = (<p className="text-gray-500 text-center mt-4">Nada para nada</p>);
		
		return (
			<div className="mt-4">
				{output}
			</div>
		);
	}
}

function Task({ task, onTaskChange, onDeleteTask }){
	function onCheckboxChange(){
		onTaskChange(task.id);
	}
	function onButtonClick(){
		onDeleteTask(task.id);
	}	
	
	return(
		<li className="space-x-2">
			<input type="checkbox" checked={task.finished} onChange={onCheckboxChange} id={`finishedCheck-${task.id}`} className="peer hidden" />
			<label htmlFor={`finishedCheck-${task.id}`} className="hover:line-through  peer-checked:text-red-600 peer-checked:hover:no-underline peer-checked:hover:text-red-500 peer-checked:hover:font-bold">{`${task.id} -- ${task.task}`}</label>
			<button className="text-red-400 text-sm" onClick={onButtonClick}>X</button>
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