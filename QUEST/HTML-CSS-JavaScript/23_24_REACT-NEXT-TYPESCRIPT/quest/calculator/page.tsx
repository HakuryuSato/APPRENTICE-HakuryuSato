"use client";

import { useState } from "react";

export default function Calculator() {
    const [display, setDisplay] = useState<string>("");

    const handleButtonClick = (
        content: string,
        type: "digit" | "operator" | "clear" | "equals",
    ) => {
        if (type === "digit") {
            setDisplay((prev) => prev + content);
        } else if (type === "operator") {
            setDisplay((
                prev,
            ) => (/\s[-+*/] $/.test(prev)
                ? prev.slice(0, -3) + ` ${content} `
                : prev + ` ${content} `)
            );
        } else if (type === "clear") {
            setDisplay("");
        } else if (type === "equals") {
            try {
                const result = Function(`"use strict"; return (${display})`)();
                setDisplay(result.toString());
            } catch {
                setDisplay("Error");
            }
        }
    };

    return (
        <div className="w-48 mx-auto text-center">
            <div
                className="h-12 mb-2 border-black border text-xl flex items-center justify-center"
                id="display"
            >
                {display}
            </div>
            <div className="grid grid-cols-4 gap-0" id="buttons">
                {[
                    "1",
                    "2",
                    "3",
                    "+",
                    "4",
                    "5",
                    "6",
                    "-",
                    "7",
                    "8",
                    "9",
                    "*",
                    "0",
                    "C",
                    "/",
                    "=",
                ].map((btn, idx) => (
                    <button
                        key={idx}
                        className="h-12 text-lg bg-gray-200 border-black border"
                        onClick={() =>
                            handleButtonClick(
                                btn,
                                btn === "C"
                                    ? "clear"
                                    : btn === "="
                                    ? "equals"
                                    : /\d/.test(btn)
                                    ? "digit"
                                    : "operator",
                            )}
                    >
                        {btn}
                    </button>
                ))}
            </div>
        </div>
    );
}
