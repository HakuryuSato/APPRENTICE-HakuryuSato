"use client";
import { useState } from "react";

const TodoApp = () => {
  const [tasks, setTasks] = useState<{ text: string; completed: boolean }[]>(
    [],
  );
  const [input, setInput] = useState("");

  const addTask = (e: React.FormEvent) => {
    e.preventDefault();
    if (input) {
      setTasks([...tasks, { text: input, completed: false }]);
      setInput("");
    }
  };

  const deleteTask = (index: number) => {
    setTasks(tasks.filter((_, i) => i !== index));
  };

  const toggleTask = (index: number) => {
    const newTasks = [...tasks];
    newTasks[index].completed = !newTasks[index].completed;
    setTasks(newTasks);
  };

  return (
    <div className="bg-gray-100 min-h-screen flex items-center justify-center">
      <div className="bg-white p-6 rounded-lg shadow-lg w-96">
        <h1 className="text-2xl font-bold text-center mb-4">Todoリスト</h1>
        <form onSubmit={addTask} className="flex mb-4">
          <input
            type="text"
            className="flex-grow p-2 border border-gray-300 rounded-l"
            placeholder="新しいタスクを入力"
            value={input}
            onChange={(e) => setInput(e.target.value)}
          />
          <button
            type="submit"
            className="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700"
          >
            タスクを追加する
          </button>
        </form>
        <ul className="list-none p-0">
          {tasks.map((task, index) => (
            <li
              key={index}
              className="flex justify-between items-center p-2 mb-2 bg-gray-200 rounded"
            >
              <input
                type="checkbox"
                checked={task.completed}
                onChange={() => toggleTask(index)}
                className="mr-2"
              />
              <span
                className={`${task.completed ? "line-through" : ""} flex-grow`}
              >
                {task.text}
              </span>
              <button
                onClick={() => deleteTask(index)}
                className="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700"
              >
                削除
              </button>
            </li>
          ))}
        </ul>
      </div>
    </div>
  );
};

export default TodoApp;
