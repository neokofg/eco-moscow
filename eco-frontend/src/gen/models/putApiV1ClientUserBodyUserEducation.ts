/**
 * Generated by orval v7.1.1 🍺
 * Do not edit manually.
 * Laravel
 * OpenAPI spec version: 1.0.0
 */

export type PutApiV1ClientUserBodyUserEducation = {
  /** Must be 4 digits. Must be at least 1900 characters. Must not be greater than 2050 characters. */
  end_year?: string;
  for_now?: boolean;
  speciality?: string;
  /** Must be 4 digits. Must be at least 1900 characters. Must not be greater than 2024 characters. */
  start_year?: string;
  university?: string;
};
