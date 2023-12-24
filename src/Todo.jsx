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
		
		//Prevenir de colocar um input vazio -> Retornando cedo
		const inputElement = document.getElementById('newTaskInput');
		onITButtonClick(inputElement.value);
		inputElement.value = '';
		inputElement.focus();
	}
	
	return(
		<>
			<form onSubmit={onSubmitTask}>
				<input type="text" placeholder="Preciso fazer..." id="newTaskInput" />
				<button>Adicionar</button>
			</form>
			<div className="flex space-x-2">
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
		</>
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

function Task({ task, onTaskChange, onDeleteTask }){
	function onCheckboxChange(){
		onTaskChange(task.id);
	}
	function onButtonClick(){
		onDeleteTask(task.id);
	}	
	
	return(
		<li className="space-x-2">
			<input type="checkbox" checked={task.finished} onChange={onCheckboxChange} id={`finishedCheck-${task.id}`} />
			<label htmlFor={`finishedCheck-${task.id}`}>{`${task.id} -- ${task.task}`}</label>
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