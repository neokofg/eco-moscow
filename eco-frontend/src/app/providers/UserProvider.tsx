"use client";

import { API_URL, privateAPI } from "@/src/shared/api";
import {
  Dispatch,
  FC,
  PropsWithChildren,
  SetStateAction,
  createContext,
  useEffect,
  useState,
} from "react";

interface UserContext {
  token: string;
  setToken: Dispatch<SetStateAction<string>>;
  user?: User;
  setUser: Dispatch<SetStateAction<User | undefined>>;
}

interface User {
  id: string;
  avatar_url: string;
  name: string;
  surname: string;
  birthdate: string;
  about: string;
  gender: string;
  email: string;
  updated_at: string;
  user_education: {
    id: string;
    created_at: string;
    updated_at: string;
    university: string;
    speciality: string;
    start_year: string;
    end_year: string;
    for_now: boolean;
    user_id: string;
  };
}

const defaultValues: UserContext = {
  token: "",
  setToken: () => null,
  setUser: () => null,
};

export const UserContext = createContext(defaultValues);

interface UserProviderProps extends PropsWithChildren {
  cookie_token: string;
}

export const UserProvider: FC<UserProviderProps> = ({
  children,
  cookie_token,
}) => {
  const [user, setUser] = useState<User>();
  const [token, setToken] = useState<string>(cookie_token);

  const validateToken = async (vToken: string) => {
    if (!vToken) return;
    const res = await fetch(API_URL + "/api/v1/client/user", {
      method: "GET",
      headers: {
        Authorization: "Bearer " + vToken,
      },
    });
    const json = await res.json();

    privateAPI.defaults.headers.common["Authorization"] = `Bearer ${vToken}`;

    setUser(json["data"]);
  };

  useEffect(() => {
    validateToken(cookie_token);
  }, [cookie_token]);

  useEffect(() => {
    validateToken(token);
  }, [token]);

  const values = {
    token,
    setToken,
    user,
    setUser,
  };

  return <UserContext.Provider value={values}>{children}</UserContext.Provider>;
};
