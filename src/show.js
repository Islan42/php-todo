import React, { StrictMode } from "react";
import { createRoot } from 'react-dom/client';

import Todo from './Todo.jsx';
const rootElement = document.getElementById('app');
const tasks = rootElement.textContent.trim();

// Render your React component instead
const root = createRoot(rootElement);
root.render(<Todo todos={tasks}/>);

