"use client"

import { sofiaSansCondensed } from "@/src/app/fonts"
import { SearchIcon } from "@/src/shared/icons"
import { Button } from "@/src/shared/ui/button"
import { Input } from "@/src/shared/ui/input"
import Image from "next/image"

const Banner = ()=>{
    return(
        <div className="container w-full">
  <Image src={'/Banner.png'} width={1504} height={640} alt="" className="" />
        <div className="absolute -bottom-20 p-6 inset-x-0 mx-auto rounded-3xl h-[152px] flex flex-col gap-4 bg-background-primary w-[736px]">
            <div className="flex flex-row gap-1" style={sofiaSansCondensed.style}>
                <p className=" text-4xl leading-[-2.5%] font-extrabold">ДОБРО ПОЖАЛОВАТЬ В {' '} </p><p className="text-content-green  text-4xl leading-[-2.5%] font-extrabold"> ЭКО!</p>
            </div>
            <div className="flex">
            <Input IconStart={SearchIcon} placeholder="Поиск" className="flex-grow" FullWidth/>
            <Button className={"ml-4 w-[100px]"}>Найти</Button>
          </div>
        </div>
        </div>
    )
}
export {Banner}